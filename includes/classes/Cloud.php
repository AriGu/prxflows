<?php
    class Cloud{
        public $id;
        public $owner;
        public $vendor;
        public $user_count;
        public $monthly_cost;
        public $monthly_price;
        
        
        public function set($x){
            private function id(){
                $this->id = $x;
            }
            
            $this->owner = $x;
            $this->vendor = $x;
            $this->user_count = $x;
            $this->monthly_cost = $x;
            $this->monthly_price = $x;
            

        }
        


    }


?>