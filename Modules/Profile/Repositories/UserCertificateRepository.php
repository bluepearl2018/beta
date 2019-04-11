<?php

namespace Modules\Profile\Repositories;

use Illuminate\Database\Eloquent\Model;
use Modules\Profile\Entities\Certificate;
use Modules\Profile\Entities\CertificateType;
use Modules\Profile\Entities\UserCertificate;

class UserCertificateRepository extends Model
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'certificate_id',
        'user_id',
        'visibility_id',
        'status_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return UserCertificate::class;
    }

    public function getCertificatesForCurrentUser($user_id)
    {
        $userCertificates = UserCertificate::where('user_id', $user_id)->get();
        $countCertificates = count($userCertificates);
        $countActiveCertificates = count($userCertificates->where('status_id', '1'));
        $countVisibleCertificates = count($userCertificates->where('visibility_id', '1'));
        $CertificateStatus = $this->getCertificateStatus($user_id);
        return compact('userCertificates', 'countCertificates', 'countActiveCertificates', 'countVisibleCertificates', 'CertificateStatus');
    }

    public function getCertificateStatus($user_id)
    {
        // dd($user_id);
        $countCertificates = count(UserCertificate::where('user_id', $user_id)->pluck('id'));
        // dd($countCertificates);
        $CertificateStatus['CertificateStatus'] = array();
        if($countCertificates < 1){
            $certificateStatus = array('CertificateStatus' => 'danger');
        }
        elseif($countCertificates >= 1){
            $certificateStatus = array('CertificateStatus' => 'success');
        }
        $CertificateStatus = array_merge($certificateStatus);
        // dd($CertificateStatus);
        return $CertificateStatus;
    }
}
