<?php
require_once 'service/v4_1/registry.php';
class registry_v4_1_custom extends registry_v4_1
{
    protected function registerFunction()
    {
        parent::registerFunction();
        $this->serviceClass->registerFunction('custom_login',
            array(
                'session'=>'xsd:string',
                'message'=>'xsd:string'),
            array(
                'return'=>'xsd:boolean')
        );
        $this->serviceClass->registerFunction('user_dashboard',
            array(
                'session'=>'xsd:string',
                'message'=>'xsd:string'),
            array(
                'return'=>'xsd:boolean')
        );
        $this->serviceClass->registerFunction('subagents_students',
            array(
                'session'=>'xsd:string',
                'message'=>'xsd:string'),
            array(
                'return'=>'xsd:boolean')
        );
        $this->serviceClass->registerFunction('subagents_pipeline_students',
            array(
                'session'=>'xsd:string',
                'message'=>'xsd:string'),
            array(
                'return'=>'xsd:boolean')
        );
        $this->serviceClass->registerFunction('relate_doc_contacts',
            array(
                'session'=>'xsd:string',
                'message'=>'xsd:string'),
            array(
                'return'=>'xsd:boolean')
        );
        $this->serviceClass->registerFunction('subagent_courses_by_status',
            array(
                'session'=>'xsd:string',
                'message'=>'xsd:string'),
            array(
                'return'=>'xsd:boolean')
        );
        $this->serviceClass->registerFunction('subagents_revenue',
            array(
                'session'=>'xsd:string',
                'message'=>'xsd:string'),
            array(
                'return'=>'xsd:boolean')
        );

         $this->serviceClass->registerFunction('signup',
            array(
                'session'=>'xsd:string',
                'message'=>'xsd:string'),
            array(
                'return'=>'xsd:boolean')
        );




    }
}