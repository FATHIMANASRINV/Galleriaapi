<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_jobs extends Base_Controller 
{
    function __construct()
    {
        parent::__construct();
    }
    public function move_Commissions()
    { 
        $cron_id = $this->Cron_jobs_model->insertCronHistory('move_Commissions');
        $commissions = $this->Cron_jobs_model->getUsersCommissions();
        $status = $this->Cron_jobs_model->MoveCommissionsToUserwallet($commissions);
        if ($status) {
            $this->Cron_jobs_model->updateCronHistory($cron_id, "finished");
            echo "finished";
        } else {
            $this->Cron_jobs_model->updateCronHistory($cron_id, "failed");
            echo "failed";
        }
    }
    function TransferChargesAndLostIncome()
    { 
        $cron_id = $this->Cron_jobs_model->insertCronHistory('TransferChargesAndLostIncome');
        $status = 0;
        $day_name = date('D');
        $date = date('Y-m-d');
        // $this->Cron_jobs_model->begin(); 
        // if(!$this->Cron_jobs_model->isCronAlreadyRun($date,'TransferChargesAndLostIncome'))
        // {
        $status = $this->Cron_jobs_model->TransferFeeAndMissedProfit();
        // }
        if ($status) {
            // $this->Cron_jobs_model->commit();
            $this->Cron_jobs_model->updateCronHistory($cron_id, "finished");
            echo "finished";
        } else {
            // $this->Cron_jobs_model->rollback();
            $this->Cron_jobs_model->updateCronHistory($cron_id, "failed");
            echo "failed";
        }
    }
}