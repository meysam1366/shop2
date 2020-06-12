<?php


namespace App\Repositories;


interface BaseModelInterface
{
    public function model();
    public function all();
    public function find($id);
    public function create();
    public function store($columns,$request);
    public function update($columns,$request,$id);
    public function destroy($id);
}
