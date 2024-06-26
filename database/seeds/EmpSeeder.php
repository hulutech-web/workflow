<?php

use App\Emp;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "name"=>"葫芦科技1",
                "email"=>"18090900235@189.cn",
                "password"=>"admin888",
                "workno"=>"SYS89757",
                "dept_id"=>1
            ],
            [
                "name"=>"葫芦科技2",

                "email"=>"18090900236@189.cn",
                "password"=>"admin888",
                "workno"=>"SYS001",
                "dept_id"=>1


            ],
            [
                "name"=>"葫芦科技3",
                "email"=>"18090900237@189.cn",
                "password"=>"admin888",
                "workno"=>"SYS002",
                "dept_id"=>1
            ]
        ];
        //创建多个

        collect($data)->each(function($item){
            $item['password']=Hash::make($item['password']);
//            创建用户Emp
            Emp::create($item);
        });
        //将所有员工的password都改为admin888
        Emp::Where("id","<>",0)->Update(["password"=>Hash::make("admin888")]);
    }
}
