<?php

	Class News extends CI_Controller {

		public function __construct(){
			parent::__construct();
			$this->load->model('news_model');
			$this->load->helper('url_helper');
		}

		public function index(){
			$data['news'] = $this->news_model->get_news();
			$data['title'] = 'News archive';

			// var_dump($data);

			//加载视图
			$this->load->view('templates/header',$data);
			$this->load->view('news/index',$data);
			$this->load->view('templates/footer',$data);
		}

		public function view($slug=NULL){
			$data['news_item'] = $this->news_model->get_news($slug);

			if(empty($data['news_item'])){
				show_404();
			}

			$data['title'] = $data['news_item']['title'];

			$this->load->view('templates/header',$data);
			$this->load->view('news/view',$data);
			$this->load->view('templates/footer',$data);

		}

		public function create(){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$data['title'] = 'Create a news item';

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('text','Text','required');

			$validation = $this->form_validation->run();

			if($validation === FALSE){
				$this->load->view('templates/header',$data);
				$this->load->view('news/create');
				$this->load->view('templates/footer');
			} else {
				$this->news_model->set_news();
				$data['message'] = '插入数据成功';
				$this->load->view('news/success',$data);
			}

		}

		public function newsList(){
			$data['newsList'] = $this->news_model->get_news();
			$data['title'] = 'News List';

			$this->load->view('templates/header',$data);
			$this->load->view('news/list',$data);
			$this->load->view('templates/footer',$data);
		}

		public function update($id) {
			$this->load->helper('form');
			//$this->load->library('form_validation');

			$id = (int) $id;
			$data['id'] = $id;
			
			$data['news_item'] = $this->news_model->get_news($id);
			$data['title'] = 'News Update'; 

			$this->load->view('templates/header',$data);
			$this->load->view('news/create',$data);
			$this->load->view('templates/footer',$data);
		}

		public function updateHandle(){
			$this->load->helper('form');
			$this->load->library('form_validation');

			$this->form_validation->set_rules('title','Title','required');
			$this->form_validation->set_rules('text','Text','required');

			$data['title'] = 'News Update'; 

			if($this->form_validation->run() === FALSE){
				$this->load->view('templates/header',$data);
				$this->load->view('news/create',$data);
				$this->load->view('templates/footer',$data);
			} else {
				$this->news_model->update_news();
				$data['message'] = '更新数据成功';
				$this->load->view('news/success',$data);
			}
		}	

	}