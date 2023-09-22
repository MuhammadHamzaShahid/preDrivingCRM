<?php
if (!defined('sugarEntry')) {
    define('sugarEntry', true);
}
require_once 'service/v4_1/SugarWebServiceImplv4_1.php';
class SugarWebServiceImplv4_1_custom extends SugarWebServiceImplv4_1
{

    function relate_doc_contacts($session, $module, $params)
    {
        //Here we check that $session represents a valid session
        if (!self::$helperObject->checkSessionAndModuleAccess(
            $session,
            'invalid_session',
            '',
            '',
            '',
            new SoapError()
        )) {
            return false;
        }
        if (!empty($params['id']) && !empty($params['contact_id'])) {
            $relBean = BeanFactory::getBean('Contacts', $params['contact_id']);
            $docBean = BeanFactory::getBean('Documents', $params['id']);
            $relBean->load_relationship('documents');
            $relBean->documents->add($docBean);
        }
    }
    function custom_login($session, $module, $params)
    {
        //Here we check that $session represents a valid session
        if (!self::$helperObject->checkSessionAndModuleAccess(
            $session,
            'invalid_session',
            '',
            '',
            '',
            new SoapError()
        )) {
            return false;
        }
        $relModule = '';
        if ($params['login_type'] == 'subagent')
            $relModule = 'igec_subagents';

        if ($params['login_type'] == 'student')
            $relModule = 'igec_mobile_users';

        if ($params['login_type'] == 'sponsor')
            $relModule = 'igec_sponsor_organization';

        if (!empty($relModule)  && $relModule == 'igec_subagents') {
            $relBean = BeanFactory::getBean($relModule);
            $beanList = $relBean->retrieve_by_string_fields(
                array(
                    'username' => $params['user_name'],
                    'password' => $params['password']
                )
            );
        } else if (!empty($relModule)  && $relModule == 'igec_mobile_users') {
            $relBean = BeanFactory::getBean($relModule);
            $beanList = $relBean->retrieve_by_string_fields(
                array(
                    'email' => $params['user_name'],
                    'user_password' => $params['password']
                )
            );
        } else if (!empty($relModule)  && $relModule == 'igec_sponsor_organization') {
            $relBean = BeanFactory::getBean($relModule);
            $beanList = $relBean->retrieve_by_string_fields(
                array(
                    'username' => $params['user_name'],
                    'user_password' => $params['password']
                )
            );
        }
        $retData = array();
        if (!empty($beanList)) {

            if ($beanList->object_name == 'igec_subagents') {
                global $db;
                $sql = "SELECT id,name FROM securitygroups WHERE deleted=0 AND id='" . $beanList->securitygroup_id . "' ";
                $result = $db->query($sql);
                $row = $db->fetchByAssoc($result);
                $retData['securitygroup_id'] = $beanList->securitygroup_id;
                $retData['securitygroup_name'] = $row['name'];
                $sql2 = 'SELECT u.id,CONCAT(IF(u.first_name IS NULL, "", u.first_name) , " ", IF(u.last_name IS NULL, "", u.last_name)  ) AS uname FROM users u, securitygroups_users sc WHERE  u.deleted=0 AND sc.deleted=0 AND sc.securitygroup_id="' . $beanList->securitygroup_id . '" AND u.id=sc.user_id';
                $result2 = $db->query($sql2);
                $scUsers = array();
                $retArr = array();
                while ($row2 = $db->fetchByAssoc($result2)) {
                    $retArr['id'] = $row2['id'];
                    $retArr['user_name'] = $row2['uname'];
                    array_push($scUsers, $retArr);
                }
                $retData['rel_counselors'] = $scUsers;
            }
            $retData['user_id'] = $beanList->id;
            $retData['user_name'] = $beanList->name;
            return json_encode($retData);
        } else
            return 'authentication failed';
    }


    // signup

    function signup()
    {
        //Here we check that $session represents a valid session
        if (!self::$helperObject->checkSessionAndModuleAccess(
            $session,
            'invalid_session',
            '',
            '',
            '',
            new SoapError()
        )) {
            return false;
        }

        $relModule = '';
        if ($params['login_type'] == 'subagent')
            $relModule = 'igec_subagents';

        if ($params['login_type'] == 'student')
            $relModule = 'igec_mobile_users';

        if ($params['login_type'] == 'sponsor')
            $relModule = 'igec_sponsor_organization';

        if (!empty($relModule)  && $relModule == 'igec_subagents') {
            $relBean = BeanFactory::getBean($relModule);
            $beanList = $relBean->retrieve_by_string_fields(
                array(
                    'username' => $params['user_name'],
                    'password' => $params['password']
                )
            );
        } else if (!empty($relModule)  && $relModule == 'igec_mobile_users') {
            $relBean = BeanFactory::getBean($relModule);
            $beanList = $relBean->retrieve_by_string_fields(
                array(
                    'email' => $params['user_name'],
                    'user_password' => $params['password']
                )
            );
        } else if (!empty($relModule)  && $relModule == 'igec_sponsor_organization') {
            $relBean = BeanFactory::getBean($relModule);
            $beanList = $relBean->retrieve_by_string_fields(
                array(
                    'username' => $params['user_name'],
                    'user_password' => $params['password']
                )
            );
        }
        $retData = array();
        if (!empty($beanList)) {

            if ($beanList->object_name == 'igec_subagents') {
                var_dump("signup");
                var_dump($beanList);
                die();
                global $db;
                $sql = "SELECT id,name FROM securitygroups WHERE deleted=0 AND id='" . $beanList->securitygroup_id . "' ";
                $result = $db->query($sql);
                $row = $db->fetchByAssoc($result);
                $retData['securitygroup_id'] = $beanList->securitygroup_id;
                $retData['securitygroup_name'] = $row['name'];
                $sql2 = 'SELECT u.id,CONCAT(IF(u.first_name IS NULL, "", u.first_name) , " ", IF(u.last_name IS NULL, "", u.last_name)  ) AS uname FROM users u, securitygroups_users sc WHERE  u.deleted=0 AND sc.deleted=0 AND sc.securitygroup_id="' . $beanList->securitygroup_id . '" AND u.id=sc.user_id';
                $result2 = $db->query($sql2);
                $scUsers = array();
                $retArr = array();
                while ($row2 = $db->fetchByAssoc($result2)) {
                    $retArr['id'] = $row2['id'];
                    $retArr['user_name'] = $row2['uname'];
                    array_push($scUsers, $retArr);
                }
                $retData['rel_counselors'] = $scUsers;
            }
            $retData['user_id'] = $beanList->id;
            $retData['user_name'] = $beanList->name;
            return json_encode($retData);
        } else
            return 'authentication failed';
    }

    function user_dashboard($session, $module, $params)
    {
        //Here we check that $session represents a valid session
        if (!self::$helperObject->checkSessionAndModuleAccess(
            $session,
            'invalid_session',
            '',
            '',
            '',
            new SoapError()
        )) {
            return false;
        }
        $uId = $params['current_user_id'];
        if ($params['login_type'] == 'subagent')
            $data = $this->processSubagentDashboard($uId);
        else  if ($params['login_type'] == 'student')
            $data = $this->processStudentDashboard($uId);

        else  if ($params['login_type'] == 'sponsor')
            $data = $this->processSponsorDashboard($uId);

        return $data;
    }
    function subagents_students($session, $module, $params)
    {
        //Here we check that $session represents a valid session
        if (!self::$helperObject->checkSessionAndModuleAccess(
            $session,
            'invalid_session',
            '',
            '',
            '',
            new SoapError()
        )) {
            return false;
        }
        global $db, $sugar_config, $app_list_strings;
        $host = $sugar_config['dbconfig']['db_host_name'];
        $user = $sugar_config['dbconfig']['db_user_name'];
        $paswd = $sugar_config['dbconfig']['db_password'];
        $db_name = $sugar_config['dbconfig']['db_name'];
        $db_port = $sugar_config['dbconfig']['db_port'];
        $mysqli = mysqli_connect($host, $user, $paswd, $db_name, $db_port);

        $uId = $params['current_user_id'];
        $res = $mysqli->multi_query("CALL  GetSubAgentStudentsData('$uId')");

        $data = array();

        if ($res) {
            $results = 0;
            do {
                if ($result = $mysqli->store_result()) {
                    $results++;
                    if ($results == 1) {
                        while ($row = $result->fetch_object()) {
                            $data[] = $row;
                        }
                    }
                }
            } while ($mysqli->next_result());
        }

        for ($i = 0; $i < count($data); $i++) {
            $conID = $data[$i]->ID;

            $res = $mysqli->multi_query(" CALL  GetSubAgentStudentOpportunitiesData('$uId','$conID') ");
            if ($res) {
                $results = 0;
                do {
                    if ($result = $mysqli->store_result()) {
                        $results++;
                        if ($results == 1) {
                            $arr = array();
                            while ($row = $result->fetch_object()) {
                                array_push($arr, $row);
                            }
                        }
                        $data[$i]->Opportunities = $arr;
                    }
                } while ($mysqli->next_result());
            }
        }
        $mysqli->close();
        $dataJson = "{\"data\":" . json_encode($data) . "}";
        return $dataJson;
    }
    function processStudentDashboard($uId)
    {
        global $db, $sugar_config, $app_list_strings;
        $host = $sugar_config['dbconfig']['db_host_name'];
        $user = $sugar_config['dbconfig']['db_user_name'];
        $paswd = $sugar_config['dbconfig']['db_password'];
        $db_name = $sugar_config['dbconfig']['db_name'];
        $db_port = $sugar_config['dbconfig']['db_port'];
        $mysqli = mysqli_connect($host, $user, $paswd, $db_name, $db_port);

        $data = array();

        if (!empty($uId)) {
            /* get lead or contact related to that mobile user id */
            $relBean = BeanFactory::getBean('igec_mobile_users', $uId);
            if (!empty($relBean->contact_id)) {
                $relId = $relBean->contact_id;
                $relBean = 'Contacts';
                $conBean = BeanFactory::getBean('Contacts', $relId);
                $data['First Name'] = $conBean->first_name;
                $data['Last Name'] = $conBean->las_name;
                $data['ID'] = $conBean->id;
                $data['Email Address'] = $conBean->email1;
                $data['Contact ID'] = $conBean->contact_number;
                $data['Stage'] = $conBean->contact_stage;
                $data['Funded By'] = $conBean->funded_by;
                $data['Student File Number'] = $conBean->student_file_number;
                $data['student_type'] = 'Contacts';
            } else if (!empty($relBean->lead_id)) {
                $relId = $relBean->lead_id;
                $relBean = 'Leads';
                $LeadBean = BeanFactory::getBean('Leads', $relId);
                $data['First Name'] = $LeadBean->first_name;
                $data['Last Name'] = $LeadBean->las_name;
                $data['ID'] = $LeadBean->id;
                $data['Email Address'] = $LeadBean->email1;
                $data['Contact ID'] = $LeadBean->lead_number;
                $data['Stage'] = 'Lead';
                $data['Funded By'] = $LeadBean->funded_by;
                $data['Student File Number'] = $LeadBean->student_file_number;
                $data['student_type'] = 'Leads';
            }
            if (!empty($relId))
                $res = $mysqli->multi_query("CALL  GetStudentDashboardData( '$relId' ,'$relBean')");
            else
                return $data;
        }
        if ($res) {
            $results = 0;
            do {
                if ($result = $mysqli->store_result()) {
                    $results++;
                    /* Total students */
                    if ($results == 1) {
                        $arr = array();
                        while ($row = $result->fetch_object()) {
                            array_push($arr, $row);
                        }
                        $data['Opportunities'] = $arr;
                    }
                }
            } while ($mysqli->next_result());
        }

        $mysqli->close();
        return $data;
    }
    function student_dashboard($session, $module, $params)
    {
        //Here we check that $session represents a valid session
        if (!self::$helperObject->checkSessionAndModuleAccess(
            $session,
            'invalid_session',
            '',
            '',
            '',
            new SoapError()
        )) {
            return false;
        }
        global $db, $sugar_config, $app_list_strings;
        $host = $sugar_config['dbconfig']['db_host_name'];
        $user = $sugar_config['dbconfig']['db_user_name'];
        $paswd = $sugar_config['dbconfig']['db_password'];
        $db_name = $sugar_config['dbconfig']['db_name'];
        $db_port = $sugar_config['dbconfig']['db_port'];
        $mysqli = mysqli_connect($host, $user, $paswd, $db_name, $db_port);
        $data = array(
            'quals' => '0',
            'skills' => '0',
            'expes' => '0',
            'langs' => '0',
            'awards' => '',
            'login_type' => '',
            'parent_id' => '',
            'basicInfo' => '',
            'docs' => '',
        );
        $uId = $params['current_user_id'];
        if ($params['login_type'] == 'subagent') {
            $relId = $params['current_user_id'];
        } else if ($params['login_type'] == 'student') {
            $relBean = BeanFactory::getBean('igec_mobile_users', $uId);
            if (!empty($relBean->contact_id)) {
                $relId = $relBean->contact_id;
            } else
                return $data;
        }

        $res = $mysqli->multi_query("CALL  GetStudentProfile('$relId')");


        if ($res) {
            $results = 0;
            do {
                if ($result = $mysqli->store_result()) {
                    $results++;

                    /* qualifications */
                    if ($results == 1) {
                        $arr = array();
                        while ($row = $result->fetch_object()) {
                            $arr[] = $row;
                        }
                        $data['quals'] = $arr;
                    }

                    /* skills */
                    if ($results == 2) {
                        $arr = array();
                        while ($row = $result->fetch_object()) {
                            $arr[] = $row;
                        }
                        $data['skills'] = $arr;
                    }

                    /* work experience  */
                    if ($results == 3) {
                        $arr = array();
                        while ($row = $result->fetch_object()) {
                            $arr[] = $row;
                        }
                        $data['expes'] = $arr;
                    }

                    /* language tests */
                    if ($results == 4) {
                        $arr = array();
                        while ($row = $result->fetch_object()) {
                            $arr[] = $row;
                        }
                        $data['langs'] = $arr;
                    }
                    /* awards*/
                    if ($results == 5) {
                        $arr = array();
                        while ($row = $result->fetch_object()) {
                            $arr[] = $row;
                        }
                        $data['awards'] = $arr;
                    }
                }
            } while ($mysqli->next_result());
        }
        $mysqli->close();
        $data['login_type'] = $params['login_type'];
        $data['parent_id'] = $relId;


        /*
            Get contact Detail
        */
        $ConBean = BeanFactory::getBean('Contacts', $relId);
        $basicInfo = array();
        $basicInfo['name'] = $ConBean->first_name . ' ' . $ConBean->middle_name . ' ' . $ConBean->last_name;
        $basicInfo['phone_mobile'] = $ConBean->phone_mobile;
        $basicInfo['email1'] = $ConBean->email1;
        $basicInfo['student_file_number'] = $ConBean->student_file_number;
        $basicInfo['nationality'] = $ConBean->nationality;
        $basicInfo['birthdate'] = $ConBean->birthdate;
        $data['basicInfo'] = $basicInfo;

        global $sugar_config;
        if ($ConBean->load_relationship('documents')) {
            $fieldsArray = array('document_name', 'category_id', 'description');
            $relatedRecords = $ConBean->documents->getBeans();

            $documents = array();
            if (!empty($relatedRecords))
                $relatedRecords = $this->processBean($relatedRecords, $fieldsArray);

            foreach ($relatedRecords as $keyDoc => $valDoc) {
                $thumb = '';
                $revBean = BeanFactory::getBean('DocumentRevisions', $relatedRecords[$keyDoc]->document_revision_id);
                if ($revBean->file_ext == 'pdf')
                    $thumb = 'default/images/pdf.png';

                else if ($revBean->file_ext == 'png' || $revBean->file_ext == 'jpg')
                    $thumb = $sugar_config['site_url'] . "/index.php?preview=yes&entryPoint=download&id=" . $relatedRecords[$keyDoc]->document_revision_id . '&type=Documents';

                else if ($revBean->file_ext == 'docx')
                    $thumb = 'default/images/doc.png';

                else  if ($revBean->file_ext == 'xlsx' || $revBean->file_ext == 'csv')
                    $thumb = 'default/images/excel.png';

                $category_id = $relatedRecords[$keyDoc]->category_id;
                if ($category_id == "Personal Document") {
                    $Personal["Name"] = $relatedRecords[$keyDoc]->document_name;
                    $Personal["document_revision_id"] = $relatedRecords[$keyDoc]->document_revision_id;
                    $Personal["ID"] = $relatedRecords[$keyDoc]->id;
                    $Personal["THUMB"] = $thumb;
                    array_push($documents, $Personal);
                }
                if ($category_id == "Educational Document") {
                    $Educational["Name"] = $relatedRecords[$keyDoc]->document_name;
                    $Educational["document_revision_id"] = $relatedRecords[$keyDoc]->document_revision_id;
                    $Educational["ID"] = $relatedRecords[$keyDoc]->id;
                    $Educational["THUMB"] = $thumb;
                    array_push($documents, $Educational);
                }
                if ($category_id == "Identification Document") {
                    $Identification["Name"] = $relatedRecords[$keyDoc]->document_name;
                    $Identification["document_revision_id"] = $relatedRecords[$keyDoc]->document_revision_id;
                    $Identification["ID"] = $relatedRecords[$keyDoc]->id;
                    $Identification["THUMB"] = $thumb;
                    array_push($documents, $Identification);
                }
                if ($category_id == "General") {
                    $General["Name"] = $relatedRecords[$keyDoc]->document_name;
                    $General["document_revision_id"] = $relatedRecords[$keyDoc]->document_revision_id;
                    $General["ID"] = $relatedRecords[$keyDoc]->id;
                    $General["THUMB"] = $thumb;
                    array_push($documents, $General);
                }
            }
        }
        $data['docs'] = $documents;

        return $data;
    }
    public function processBean($beanArr, $fieldsArray)
    {
        foreach ($beanArr as $key => $val) {
            foreach ($fieldsArray as $key2 => $val2) {
                if (empty($val->$val2))
                    $val->$val2 = '-';
            }
        }
        return $beanArr;
    }
}
