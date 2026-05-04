<?php
namespace App\Controllers;

use App\Models\EnquiryModel;

class AdminEnquiries extends BaseController
{
    protected $enquiryModel;

    public function __construct()
    {
        $this->enquiryModel = new EnquiryModel();
    }

    public function index()
    {
        $data['enquiries'] = $this->enquiryModel->orderBy('created_at', 'DESC')->get()->getResultArray();
        return view('admin/enquiries/index', $data);
    }

    public function read($id)
    {
        $enquiry = $this->enquiryModel->find($id);
        if ($enquiry) {
            $this->enquiryModel->update($id, ['status' => 'Read']);
        }
        return redirect()->to('AdminPortal/enquiries');
    }

    public function delete($id)
    {
        $this->enquiryModel->delete($id);
        return redirect()->to('AdminPortal/enquiries')->with('message', 'Enquiry deleted successfully.');
    }
}
