<?php

	Class News_model extends CI_Model {

		public function __construct(){
			$this->load->database();
		}

		//查询数据	
		public function get_news($slug = FALSE){
			if($slug === FALSE){
				$query = $this->db->get('news');
				return $query->result_array();
			}

			$query = $this->db->get_where('news',array('slug'=>$slug));
			return $query->row_array();
		}

		//插入数据
		public function set_news(){
			$this->load->helper('url');

			$slug = url_title($this->input->post('title'),'dash',TRUE);

			$data = array(
				'title' => $this->input->post('title'),
				'slug' => $slug,
				'text' => $this->input->post('text')
			);

			return $this->db->insert('news',$data);
		}

	}