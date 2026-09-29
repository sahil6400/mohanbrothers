<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;

class Enquiry extends BaseController
{
    public function submit()
    {
        $rules = [
            'name'     => 'required|min_length[2]|max_length[100]',
            'email'    => 'required|valid_email|max_length[150]',
            'phone'    => 'permit_empty|max_length[30]',
            'country'  => 'permit_empty|max_length[100]',
            'category' => 'permit_empty|max_length[150]',
            'message'  => 'permit_empty|max_length[1000]',
        ];

        if (! $this->validate($rules)) {
            if ($this->request->isAJAX()) {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'success' => false,
                    'message' => 'Please provide a valid name and email address.',
                    'errors'  => $this->validator->getErrors(),
                ])->setStatusCode(400);
            }

            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $enquiryData = [
            'id'           => uniqid('ENQ-'),
            'name'         => $this->request->getPost('name'),
            'email'        => $this->request->getPost('email'),
            'phone'        => $this->request->getPost('phone'),
            'country'      => $this->request->getPost('country') ?: 'India',
            'city'         => $this->request->getPost('city') ?: '',
            'category'     => $this->request->getPost('category') ?: '',
            'product_name' => $this->request->getPost('product_name') ?: '',
            'product_code' => $this->request->getPost('product_code') ?: '',
            'message'      => $this->request->getPost('message'),
            'status'       => 'new',
            'created_at'   => date('Y-m-d H:i:s'),
            'ip_address'   => $this->request->getIPAddress(),
        ];

        // Store enquiry in writable logs/enquiries.json or database if configured
        $logPath = WRITEPATH . 'enquiries.json';
        $existing = [];
        if (file_exists($logPath)) {
            $existing = json_decode(file_get_contents($logPath), true) ?? [];
        }
        $existing[] = $enquiryData;
        file_put_contents($logPath, json_encode($existing, JSON_PRETTY_PRINT));

        if ($this->request->isAJAX()) {
            return $this->response->setJSON([
                'status'  => 'success',
                'success' => true,
                'message' => 'Thank you for reaching out! Your enquiry has been received and our engineering team will get back to you within 24 hours.',
            ]);
        }

        return redirect()->to('/#contact')->with('success', 'Enquiry received successfully.');
    }
}
