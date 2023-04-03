<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

class ContractorCredit extends Entity
{
    
    protected $_accessible = [
        'user_id' => true,
        'total_credit' => true,
        'credited_date' => true,
        'user' => true,
    ];
}
