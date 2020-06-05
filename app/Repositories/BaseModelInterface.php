<?php


namespace App\Repositories;


interface BaseModelInterface
{
    public function all();
    public function find($id);
    public function destroy($id);
}
