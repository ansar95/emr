<?php
$this->load->view('templatesidebar/header');
// $this->load->view('templatesidebar/rightside');
$this->load->view($include);
$this->load->view('templatesidebar/footer');
if(isset($js)){
	$this->load->view('support/js/'.$js);
}
?>


</body>
</html>
