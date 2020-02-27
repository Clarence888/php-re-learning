<?php
namespace Sample;

/**
 * Autogenerated by Thrift Compiler (0.14.0)
 *
 * DO NOT EDIT UNLESS YOU ARE SURE THAT YOU KNOW WHAT YOU ARE DOING
 *  @generated
 */
use Thrift\Base\TBase;
use Thrift\Type\TType;
use Thrift\Type\TMessageType;
use Thrift\Exception\TException;
use Thrift\Exception\TProtocolException;
use Thrift\Protocol\TProtocol;
use Thrift\Protocol\TBinaryProtocolAccelerated;
use Thrift\Exception\TApplicationException;

class User
{
    static public $isValidate = false;

    static public $_TSPEC = array(
        1 => array(
            'var' => 'id',
            'isRequired' => true,
            'type' => TType::I32,
        ),
        2 => array(
            'var' => 'name',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        3 => array(
            'var' => 'avatar',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        4 => array(
            'var' => 'address',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
        5 => array(
            'var' => 'mobile',
            'isRequired' => true,
            'type' => TType::STRING,
        ),
    );

    /**
     * @var int
     */
    public $id = null;
    /**
     * @var string
     */
    public $name = null;
    /**
     * @var string
     */
    public $avatar = null;
    /**
     * @var string
     */
    public $address = null;
    /**
     * @var string
     */
    public $mobile = null;

    public function __construct($vals = null)
    {
        if (is_array($vals)) {
            if (isset($vals['id'])) {
                $this->id = $vals['id'];
            }
            if (isset($vals['name'])) {
                $this->name = $vals['name'];
            }
            if (isset($vals['avatar'])) {
                $this->avatar = $vals['avatar'];
            }
            if (isset($vals['address'])) {
                $this->address = $vals['address'];
            }
            if (isset($vals['mobile'])) {
                $this->mobile = $vals['mobile'];
            }
        }
    }

    public function getName()
    {
        return 'User';
    }


    public function read($input)
    {
        $xfer = 0;
        $fname = null;
        $ftype = 0;
        $fid = 0;
        $xfer += $input->readStructBegin($fname);
        while (true) {
            $xfer += $input->readFieldBegin($fname, $ftype, $fid);
            if ($ftype == TType::STOP) {
                break;
            }
            switch ($fid) {
                case 1:
                    if ($ftype == TType::I32) {
                        $xfer += $input->readI32($this->id);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 2:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->name);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 3:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->avatar);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 4:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->address);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                case 5:
                    if ($ftype == TType::STRING) {
                        $xfer += $input->readString($this->mobile);
                    } else {
                        $xfer += $input->skip($ftype);
                    }
                    break;
                default:
                    $xfer += $input->skip($ftype);
                    break;
            }
            $xfer += $input->readFieldEnd();
        }
        $xfer += $input->readStructEnd();
        return $xfer;
    }

    public function write($output)
    {
        $xfer = 0;
        $xfer += $output->writeStructBegin('User');
        if ($this->id !== null) {
            $xfer += $output->writeFieldBegin('id', TType::I32, 1);
            $xfer += $output->writeI32($this->id);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->name !== null) {
            $xfer += $output->writeFieldBegin('name', TType::STRING, 2);
            $xfer += $output->writeString($this->name);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->avatar !== null) {
            $xfer += $output->writeFieldBegin('avatar', TType::STRING, 3);
            $xfer += $output->writeString($this->avatar);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->address !== null) {
            $xfer += $output->writeFieldBegin('address', TType::STRING, 4);
            $xfer += $output->writeString($this->address);
            $xfer += $output->writeFieldEnd();
        }
        if ($this->mobile !== null) {
            $xfer += $output->writeFieldBegin('mobile', TType::STRING, 5);
            $xfer += $output->writeString($this->mobile);
            $xfer += $output->writeFieldEnd();
        }
        $xfer += $output->writeFieldStop();
        $xfer += $output->writeStructEnd();
        return $xfer;
    }
}
