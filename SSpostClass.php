<?php
	class SSpost
	{
		private $price_500g = array("insidePart" => 5750, "edgePart" => 7800,"outsidePart" => 8400);
		private $price_501g_1000g = array("insidePart" => 7400, "edgePart" => 10000,"outsidePart" => 11200);
		private $price_1001g_2000g = array("insidePart" => 9800, "edgePart" => 12700,"outsidePart" => 14000);
		private $price_2000g_Higher = 2500;

		private $MALIAT = 9; // percent
		private $BIME = 800;

		private $addPrice;

		private $sourcePartId;
		private $partId;
		private $weight;

		function __construct($sourcePartId,$partId, $weight)
		{
			$this->sourcePartId = $sourcePartId;
			$this->partId = $partId;
			$this->weight = $weight;

			$this->addPrice = $this->BIME;
		}

		public function post()
		{
			$checkPart = false;

			foreach ($this->postInsidePart($this->sourcePartId) as $value) 
			{
				if ($value == $this->partId)	
					$checkPart = true;
			}

			if ($checkPart == true) {
				$result = $this->postPrice("edgePart") + $this->addPrice;
				$result += $result * ($this->MALIAT / 100);
			}
			else if ($this->sourcePartId == $this->partId)
			{
				$result = $this->postPrice("insidePart") + $this->addPrice;
				$result += $result * ($this->MALIAT / 100);
			}
			else
			{
				$result = $this->postPrice("outsidePart") + $this->addPrice;
				$result += $result * ($this->MALIAT / 100);
			}
			return $result;
		}

		private function postPrice($type)
		{
			if ($this->weight <= 500)
			{
				return $this->price_500g[$type];
			}
			else if ($this->weight >= 501 && $this->weight <= 1000)
			{
				return $this->price_501g_1000g[$type];
			}
			else if ($this->weight >= 1001 && $this->weight <= 2000)
			{
				return $this->price_1001g_2000g[$type];
			}
			else if($this->weight > 2000){
				$tmp = intval(($this->weight - 2000) / 1000);
				if (!is_int(($this->weight - 2000) / 1000)) {
					$tmp++;
				}
				return $this->price_1001g_2000g[$type] + ($tmp * $this->price_2000g_Higher);
			}
			else 
				return 0;
		}

		private function postInsidePart($sourcePartId)
		{
			$result = array();
			switch ($sourcePartId) {
				case 1:
					$result = array(13,31,11,10,9);
					break;
				case 2:
					$result = array(15,12,8,13);
					break;
				case 3:
					$result = array(15,12,16);
					break;
				case 4:
					$result = array(27,20,24,28,21);
					break;
				case 5:
					$result = array(21,28,6,25,22,23);
					break;
				case 6:
					$result = array(5,25,9,10,11,20,24,28);
					break;
				case 7:
					$result = array(29,9,30,25);
					break;
				case 8:
					$result = array(2,12,17,11,31,13);
					break;
				case 9:
					$result = array(6,25,7,29,14,13,1,10);
					break;
				case 10:
					$result = array(1,6,9,11);
					break;
				case 11:
					$result = array(6,10,1,31,8,17,20);
					break;
				case 12:
					$result = array(3,16,15,2,8,17,18);
					break;
				case 13:
					$result = array(14,2,1,31,8,9);
					break;
				case 14:
					$result = array(29,9,13);
					break;
				case 15:
					$result = array(3,2,12);
					break;
				case 16:
					$result = array(3,12,18);
					break;
				case 17:
					$result = array(18,19,12,8,11,20);
					break;
				case 18:
					$result = array(17,19,12,16);
					break;
				case 19:
					$result = array(18,17,20,27);
					break;
				case 20:
					$result = array(11,17,19,27,6,24,4);
					break;
				case 21:
					$result = array(23,5,28,4);
					break;
				case 22:
					$result = array(26,23,5,25,30);
					break;
				case 23:
					$result = array(26,22,5,21);
					break;
				case 24:
					$result = array(6,28,4,20);
					break;
				case 25:
					$result = array(30,6,5,22,9,7);
					break;
				case 26:
					$result = array(23,22,30);
					break;
				case 27:
					$result = array(4,20,19);
					break;
				case 28:
					$result = array(6,24,4,21,5);
					break;
				case 29:
					$result = array(14,9,7);
					break;
				case 30:
					$result = array(26,22,25,7);
					break;
				case 31:
					$result = array(13,8,1,11);
					break;
				default:
					$result = 0;
					break;
			}
			return $result;
		}
		
	}
	/**
	 
	1=>تهران
	2=>گیلان
	3=>آذربایجان شرقی
	4=>خوزستان
	5=>فارس
	6=>اصفهان
	7=>خراسان رضوی
	8=>قزوین
	9=>سمنان
	10=>قم
	11=>مرکزی
	12=>زنجان
	13=>مازندران
	14=>گلستان
	15=>اردبیل
	16=>آذربایجان غربی
	17=>همدان
	18=>کردستان
	19=>کرمانشاه
	20=>لرستان
	21=>بوشهر
	22=>کرمان
	23=>هرمزگان
	24=>چهارمحال و بختیاری
	25=>یزد
	26=>سیستان و بلوچستان
	27=>ایلام
	28=>کهگلویه و بویراحمد
	29=>خراسان شمالی
	30=>خراسان جنوبی
	31=>البرز

	--------- SQL -----------

	INSERT INTO `provinces` (`id`, `name`) VALUES
	(1, 'تهران'),
	(2, 'گیلان'),
	(3, 'آذربایجان شرقی'),
	(4, 'خوزستان'),
	(5, 'فارس'),
	(6, 'اصفهان'),
	(7, 'خراسان رضوی'),
	(8, 'قزوین'),
	(9, 'سمنان'),
	(10, 'قم'),
	(11, 'مرکزی'),
	(12, 'زنجان'),
	(13, 'مازندران'),
	(14, 'گلستان'),
	(15, 'اردبیل'),
	(16, 'آذربایجان غربی'),
	(17, 'همدان'),
	(18, 'کردستان'),
	(19, 'کرمانشاه'),
	(20, 'لرستان'),
	(21, 'بوشهر'),
	(22, 'کرمان'),
	(23, 'هرمزگان'),
	(24, 'چهارمحال و بختیاری'),
	(25, 'یزد'),
	(26, 'سیستان و بلوچستان'),
	(27, 'ایلام'),
	(28, 'کهگلویه و بویراحمد'),
	(29, 'خراسان شمالی'),
	(30, 'خراسان جنوبی'),
	(31, 'البرز');
	COMMIT;

	 */
?>