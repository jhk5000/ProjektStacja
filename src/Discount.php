<?php
/**
 * Created by PhpStorm.
 * User: Adrian
 * Date: 2018-04-25
 * Time: 14:19
 */

class Discount
{
    protected $discount_id;
    protected $User_user_id;
    protected $discount;

    /**
     * Discount constructor.
     * @param $discount_id
     * @param $User_user_id
     * @param $discount
     */
    public function __construct($discount_id, $User_user_id, $discount)
    {
        $this->discount_id = $discount_id;
        $this->User_user_id = $User_user_id;
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
    public function getUserUserId()
    {
        return $this->User_user_id;
    }

    /**
     * @param mixed $User_user_id
     */
    public function setUserUserId($User_user_id)
    {
        $this->User_user_id = $User_user_id;
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