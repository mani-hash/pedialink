<?php

namespace App\Services;
use App\Models\Test;



class TestService
{

    public function getAllTestDetails()
    {
        $tests = Test::query()->get();

        $resource = [];

        foreach ($tests as $test) {
            $resource[] = [
                "id" => $test->id,
                "name" => $test->name,
                "category" => $test->category,
                "stock" => $test->stock,
                "price" => $test->price,
                "created_at" => $test->created_at,
               
            ];
        }

        return $resource;
    }


    public function getSearchResults($search){
        $tests = Test::query()->get();

        $resource = [];

        foreach ($tests as $test) {
            $resource[] = [
                "id" => $test->id,
                "name" => $test->name,
                "category" => $test->category,
                "stock" => $test->stock,
                "price" => $test->price,
                "created_at" => $test->created_at,
               
            ];
        }

         if ($search) {
        $searchResutls = array_filter($resource, function ($row) use ($search) {
            $s = strtolower($search);
            return str_contains(strtolower($row['name']), $s)
                || str_contains(strtolower($row['category']), $s)
                || str_contains(strtolower($row['price']), $s);
        });
    }

    return $searchResutls;



    }

}



?>