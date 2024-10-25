<?php
    class Controller_Api_Tournament extends Controller_Rest
    {
        protected $format = 'json';
        public function get_detail($id)
        {
            $tournament = Model_Tournament::get_detail_tournaments($id);
            return $this -> response($tournament);
        }
    }
   