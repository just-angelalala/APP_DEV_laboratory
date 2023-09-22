<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\StudentModel;
use App\Models\SectionModel;

class StudentController extends BaseController
{
    private $students;
    private $sections;
    private $genders = ['Male', 'Female'];
    private $yearlevel = ['1', '2', '3','4'];
    
    public function __construct()
     {
        $this->students = new StudentModel();
        $this->sections = new SectionModel();
     }
     
     public function index()
     {
        $data = [
          'students' => $this->students->findAll(),
          'sections' => $this->sections->findAll(),
          'genders' => $this->genders,
          'yearlevel' => $this->yearlevel
        ];
        return view('index', $data);
     }

     public function studentInfo()
     {
        $data = [
         'students' => $this->students->findAll(),
         'sections' => $this->sections->findAll(),
         'genders' => $this->genders,
         'yearlevel' => $this->yearlevel

        ];
        return view('index', $data);
     }

     public function save()
     {
        @$id = $this->request->getVar('id');
        $data = [
          'StudID' => $this->request->getVar('studentID'),
          'StudName' => $this->request->getVar('studentName'),
          'StudGender' => $this->request->getVar('studentGender'),
          'StudCourse' => $this->request->getVar('studentCourse'),
          'StudSection' => $this->request->getVar('studentSection'),
          'StudYear' => $this->request->getVar('studentYear')
        ];

        if ($id !== null) {
          $this->students->set ($data)->where ('id',$id)->update();
        } else {
          $this->students->insert( $data);
        }
        return redirect()->to('/studentInfo');
     }

     public function editStudentInfo($id = null)
     {
        $data = [
        'students' => $this->students->findAll(),
        'sections' => $this->sections->findAll(),
        'genders' => $this->genders,
        'yearlevel' => $this->yearlevel,
        'studentInfoEdit' => $this->students->where('id', $id)->first()
        ];
        return view('index', $data);
     }

     public function deleteStudentInfo($id = null)
     {
        $this->students->delete($id);
        return redirect()->to('/studentInfo');
     }

}