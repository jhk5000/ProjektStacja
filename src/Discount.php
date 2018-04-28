<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:19
 */
/**
 * @Entity @Table(name="discount")
 */
class Discount
{
    /**
     * @Id @GeneratedValue @Column(type="integer")
     * @var string
     */
    protected $discount_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $Users_user_id;
    /**
     * @Column(type="string")
     * @var string
     */
    protected $discount;

    /**
     * Discount constructor.
     * @param $discount_id
     * @param $Users_user_id
     * @param $discount
     */
    public function __construct($discount_id, $Users_user_id, $discount)
    {
        $this->discount_id = $discount_id;
        $this->Users_user_id = $Users_user_id;
        $this->discount = $discount;
    }

    /**
     * @return mixed
     */
    public function getDiscountId()
    {
        return $this->discount_id;
    }

    /**
     * @param mixed $discount_id
     */
    public function setDiscountId($discount_id)
    {
        $this->discount_id = $discount_id;
    }

    /**
     * @return mixed
     */
    public function getUsersUserId()
    {
        return $this->Users_user_id;
    }

    /**
     * @param mixed $User_user_id
     */
    public function setUsersUserId($Users_user_id)
    {
        $this->Users_user_id = $Users_user_id;
    }

    /**
     * @return mixed
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * @param mixed $discount
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;
    }


}