<?php
namespace Ceyuboglu; 
include 'dbconnect.php';
class dbactions
{
	private $host;
	private $db;
	private $user;
	private $password;
	private $charset;
	public $dbh;
	public function __construct($configFile)
	{
		$config = \yaml_parse_file($configFile);
		$this->host = $config['database']['host'];
		$this->db = $config['database']['db'];
		$this->user = $config['database']['user'];
		$this->password = $config['database']['password'];
		$this->charset = $config['database']['charset'];

		try{
			$this->dbh = new  \PDO('mysql:hostname='.$this->host.';dbname='.$this->db.';charset='.$this->charset,$this->user,$this->password);
		}	catch (\PDOException $e){
			die($e->getMessage());
		}			
	}
	public function update($table,$h1,$sub,$fb,$tw,$inst,$linkin,$gh)
	{
		$sql="UPDATE $table SET blog_h1=:h1,blog_sub=:sub,blog_fb=:fb,blog_tw=:tw,blog_inst=:inst,blog_linkin=:linkin,
		blog_gh=:gh";
		$q=$this->dbh->prepare($sql);
		$q->execute(array(':h1'=>$h1,':sub'=>$sub,':fb'=>$fb,':tw'=>$tw,':inst'=>$inst,':linkin'=>$linkin,':gh'=>$gh));
	}
	public function updateAbout($about)
	{
		$sql="UPDATE blogmain SET blog_about=:blog_about";
		$q=$this->dbh->prepare($sql);
		$q->execute(array(':blog_about'=>$about));
	}
	public function newArticle($title,$text,$date)
	{
		$sql="INSERT INTO articles SET article_title=:title,article_text=:text,article_date=:date";
		$q=$this->dbh->prepare($sql);
		$q->execute(array(':title'=>$title,':text'=>$text,':date'=>$date));
	}
	public function editArticle($id,$title,$text)
	{
		$sql="UPDATE articles SET article_title=:title,article_text=:text WHERE id=$id";
		$q=$this->dbh->prepare($sql);
		$q->execute(array(':title'=>$title,':text'=>$text));
	}
	public function findArticle($id)
	{
		$sql="SELECT * FROM articles WHERE id=$id";
		$q=$this->dbh->query($sql) or die("failed!");;
		while($selectedArticle=$q->fetch(\PDO::FETCH_ASSOC))
		{
			$data[]=$selectedArticle;
		}
		return $data;
	}
	public function deleteArticle($id)
	{
		$sql="DELETE FROM articles where id=$id";
		$q=$this->dbh->prepare($sql);
		$q->execute();

	}
	public function showData($table)
	{
		$sql="SELECT * FROM $table ORDER BY id DESC";
		$q = $this->dbh->query($sql) or die("failed!");
		while($r = $q->fetch(\PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		return @$data;
	}
	public function getByid($table,$id)
	{
		$sql="SELECT * FROM $table where id=$id";
		$q=$this->dbh->prepare($sql);
		$q->execute();
		$data = $q->fetch(\PDO::FETCH_ASSOC);
		return $data;	
	}	
	public function search($sc){
		$sql="SELECT * FROM articles where article_title LIKE :word";
		$q=$this->dbh->prepare($sql);
		$q->bindValue("word","%$sc%",\PDO::PARAM_STR);
		$q->execute();
		$result = $q->fetchAll(\PDO::FETCH_ASSOC);
		return $result;
	}
	public function newComment($pageİd,$name,$email,$website=null,$text,$date)
	{
		$sql="INSERT INTO comments SET page_id=:id,comment_text=:text,comment_date=:date,comment_name=:name,comment_email=:email,comment_website=:website,comment_status=:status";
		$q=$this->dbh->prepare($sql);
		$q->execute(array(':id'=>$pageİd,':text'=>$text,':date'=>$date,':name'=>$name,':email'=>$email,':website'=>$website,':status'=>'0'));
	}
	public function getcomments($pageİd)
	{
		$sql="SELECT * FROM comments where page_id=$pageİd ORDER BY id DESC";
		$q = $this->dbh->query($sql) or die("failed!");
		while($r = $q->fetch(\PDO::FETCH_ASSOC)){
		$data[]=$r;
		}
		return @$data;	
	}

	public function confirmComments($id)
	{

	}	


}















































 ?>