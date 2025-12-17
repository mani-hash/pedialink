<?php

namespace App\Controllers\Parent;
use App\Services\ChildService;
use Library\Framework\Http\Request;
use Library\Framework\Http\RedirectResponse;


class MyChildrenController
{
    private
    $childDetails = [
        [
            'id' => "CHD001",
            "image" => "",
            "name" => "Sara Johnson",
            "nickname" => "Baby Sara",
            "height" => "85",
            "weight" => "1.25",
            "bmi" => "",
            "blood" => "O+",
            "status" => "Good",
            "dob" => "22-10-2023",
            "age" => "2 Years old",
            "phm" => "Dr. Smith",
            "appointments" => 1,
            "vaccinations" => 0,
            "parent_name" => "Johnson Alex",
            "parent_phone" => "+945678987",
            "parent_email" => "johnson@gmail.com"
        ],
        [
            "id" => "CHD002",
            "image" => "",
            "name" => "Sara Johnson",
            "nickname" => "Baby Sara",
            "height" => "90",
            "weight" => "1.30",
            "bmi" => "",
            "blood" => "A+",
            "status" => "Critical",
            "dob" => "22-10-2023",
            "age" => "2 Years old",
            "phm" => "Dr. Smith",
            "appointments" => 1,
            "vaccinations" => 0,
            "parent_name" => "Ajay Hales",
            "parent_phone" => "+945678987",
            "parent_email" => "abc@gmail.com"
        ],
        [
            "id" => "CHD003",
            "image" => "",
            "name" => "Sara Johnson",
            "nickname" => "Baby Sara",
            "height" => "82",
            "weight" => "1.20",
            "bmi" => "",
            "blood" => "B+",
            "status" => "Good",
            "dob" => "22-10-2023",
            "age" => "2 Years old",
            "phm" => "Dr. Smith",
            "appointments" => 1,
            "vaccinations" => 0,
            "parent_name" => "Ajay Hales",
            "parent_phone" => "+945678987",
            "parent_email" => "abc@gmail.com"
        ],


        [
            "id" => "CHD004",
            "image" => "",
            "name" => "Sara Johnson",
            "nickname" => "Baby Sara",
            "height" => "88",
            "weight" => "1.35",
            "bmi" => "",
            "blood" => "AB+",
            "status" => "Critical",
            "dob" => "22-10-2023",
            "age" => "2 Years old",
            "phm" => "Dr. Smith",
            "appointments" => 1,
            "vaccinations" => 0,
            "parent_name" => "Ajay Hales",
            "parent_phone" => "+945678987",
            "parent_email" => "abc@gmail.com"
        ],

    ];

    private $childService;

    public function __construct()
    {

        $this->childService = new ChildService();

    }
    public function index()
    {
        $childDetails = $this->childService->getChildernByParentId(auth()->id());

        return view("parent/my-children", ['childDetails' => $childDetails]);
    }

    public function viewChildDetails(Request $request, $id)
    {
        $child = current(array_filter($this->childDetails, function ($child) use ($id) {
            return $child['id'] === $id;
        }));

        if (empty($child)) {
            return redirect('/parent/my-children')->withMessage(
                "Child Not Found",
                "No child record was found for the provided ID. Please verify the ID and try again.",
                "error",
            );
        }
        return view("parent/my-child-details", data: ['child' => $child]);

    }
}