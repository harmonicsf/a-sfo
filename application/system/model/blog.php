<?php
class system_model_blog extends model{
	public function search($q){
		$query=self::$db->query("SELECT * FROM `post` INNER JOIN rawurl ON CONCAT(  'post-', `post`.`postid` ) = `rawurl`.`router` INNER JOIN `user` ON `post`.`userid` = `user`.`userid` {$condition} $orderby LIMIT {$limit}");
		if($query->num_rows > 0){
			while($result = $query->fetch_assoc())
			$blog[] = $result;
			return $blog;
		}
		else
		return false;
	}
	public function unlink_tagofpost($postid){
		self::$db->query("DELETE FROM `tag_link` WHERE `postid` = {$postid}");
	}
	public function get_alltag(){
		$query=self::$db->query("SELECT * FROM `tag` LEFT JOIN `tag_link` ON `tag`.`tagid` = `tag_link`.`tagid` LEFT JOIN `rawurl` ON `rawurl`.`router` = CONCAT('tag-', `tag`.`tagid`)");
		if($query->num_rows > 0){
			while($result = $query->fetch_assoc())
			$arr[] = $result;
			return $arr;
		}
		else
		return false;
	}
	public function total_postoftag($tagid){
		$query = self::$db->query("SELECT COUNT(*) FROM `tag_link` WHERE `tagid` = {$tagid}");
		if($query){
			$result = $query->fetch_row();
			return $result[0];
		}
		return(false);
	}
	public function get_tag($tagid){
		$query=self::$db->query("SELECT * FROM `tag` INNER JOIN `tag_link` ON `tag`.`tagid` = `tag_link`.`tagid` INNER JOIN `rawurl` ON `rawurl`.`router` = CONCAT('tag-', `tag`.`tagid`) WHERE `tag`.`tagid` = {$tagid}");
		return $query->num_rows > 0 ? $query->fetch_assoc() : false;
	}
	public function get_tagofpost($postid){
		$query=self::$db->query("SELECT * FROM `tag` INNER JOIN `tag_link` ON `tag`.`tagid` = `tag_link`.`tagid` INNER JOIN `rawurl` ON `rawurl`.`router` = CONCAT('tag-', `tag`.`tagid`) WHERE `tag_link`.`postid` = {$postid}");
		if($query->num_rows > 0){
			while($result = $query->fetch_assoc())
			$arr[] = $result;
			return $arr;
		}
		else
		return false;
	}
	public function edit_tag($tags, $postid){
		$newtag = false;
		self::$db->query("DELETE FROM `tag_link` WHERE `postid` = '".$postid."'");
		foreach ($tags as $tag)
		{
			$tag = self::$db->real_escape_string(trim($tag));
			if(strlen($tag) > 3) {
				$result = self::$db->query("SELECT * FROM `tag` WHERE `name` = '".$tag."' LIMIT 0,1");
				if ($result->num_rows > 0)
				{
					$tagc = $result->fetch_assoc();
					$tagid = $tagc['tagid'];
				}
				else
				{
					self::$db->query("INSERT INTO `tag` (name) VALUES ('{$tag}')");
					$tagid = self::$db->insert_id;
					$newtag[] = array('tagid' => $tagid, 'name' => $tag);
				}
				self::$db->query("INSERT INTO `tag_link` (postid, tagid) VALUES ('{$postid}', '{$tagid}')");
			}
		}
		return $newtag;
	}
	public function tag_arr_to_str($arr){
		$tags = false;
		$tags = implode(",", $arr);
		return $tags;
	}
	public function tag_str_to_arr($str){
		$tags = false;
		$tagsx = explode(",", $str);
		foreach($tagsx as $tag)
		$tags[] = trim($tag);
		return $tags;
	}
	public function total_post($condition = null){
		$result = self::$db->query("SELECT COUNT(*) FROM `post` $condition")->fetch_row();
		return($result[0]);
	}
	public function thumb_update($id, $thumburl){
		self::$db->query("UPDATE `post` SET `thumb` = '{$thumburl}' WHERE `postid` = {$id}");
	}
	public function edit_post($data){
		self::$db->query("UPDATE `post` SET
			`name` = '".self::$db->real_escape_string($data['name'])."',
			`description` = '".self::$db->real_escape_string($data['description'])."',
			`content` = '".self::$db->real_escape_string($data['content'])."',
			`categoryid` = {$data['categoryid']},
			`time` = {$data['time']}
			WHERE `postid` = {$data['postid']}");
		}
		public function delete_post($id){
			self::$db->query("DELETE FROM `post` WHERE `postid` = {$id}");
		}
		public function check_category_exist($name, $except = 0){
			$query=self::$db->query("SELECT * FROM `category` WHERE `name` = '".self::$db->real_escape_string($name)."' AND `categoryid` != {$except}");
			return $query->num_rows > 0 ? true : false;
		}
		public function new_category($data){
			self::$db->query("INSERT INTO `category` VALUES (NULL ,  '{$data['name']}')");
			return self::$db->insert_id;
		}
		public function edit_category($data){
			self::$db->query("UPDATE `category` SET `name` = '{$data['name']}' WHERE `categoryid` = {$data['categoryid']}");
		}
		public function delete_category($id){
			self::$db->query("DELETE FROM `category` WHERE `categoryid` = {$id}");
			self::$db->query("UPDATE  `post` SET  `categoryid` =  0 WHERE  `categoryid` = {$id}");
		}
		public function getpost($postid){
			$query=self::$db->query("SELECT * FROM `post` WHERE `postid` = '{$postid}'");
			return $query->num_rows > 0 ? $query->fetch_assoc() : false;
		}
		public function postlist($limit = 10, $condition = null, $orderby = "order by `time` DESC"){
			$query=self::$db->query("SELECT * FROM `post` INNER JOIN rawurl ON CONCAT(  'post-', `post`.`postid` ) = `rawurl`.`router` INNER JOIN `user` ON `post`.`userid` = `user`.`userid` {$condition} $orderby LIMIT {$limit}");
			if($query->num_rows > 0){
				while($result = $query->fetch_assoc())
				$blog[] = $result;
				return $blog;
			}
			else
			return false;
		}
		public function categories(){
			$blog[0] = array('categoryid' => 0, 'name' => 'uncategorized', 'rawurl' => 'uncategorized');
			$query=self::$db->query("SELECT * FROM `category`  INNER JOIN rawurl ON CONCAT(  'category-', category.categoryid ) = rawurl.router");
			if($query->num_rows > 0){
				while($result = $query->fetch_assoc()){
					$keyid = $result['categoryid'];
					$blog[$keyid] = array('categoryid' => $result['categoryid'], 'name' => $result['name'], 'rawurl' => $result['path']);
				}
				return $blog;
			}
			else
			return array(array('categoryid' => 0, 'name' => 'uncategorized', 'rawurl' => 'uncategorized'));
		}
		public function recent($limit = 3, $condition = null, $orderby = "order by `time` DESC"){
			$query=self::$db->query("SELECT * FROM `post` INNER JOIN rawurl ON CONCAT(  'post-', `post`.`postid` ) = `rawurl`.`router` INNER JOIN `user` ON `post`.`userid` = `user`.`userid` {$condition} $orderby LIMIT {$limit}");
			if($query->num_rows > 0){
				while($result = $query->fetch_assoc())
				$blog[] = $result;
				return $blog;
			}
			else
			return false;
		}
		public function newpost($data){
			$data['categoryid'] = isset($data['categoryid']) ? $data['categoryid'] : 1;
			self::$db->query("INSERT INTO `post` (
				`name`,
				`description`,
				`content`,
				`userid`,
				`categoryid`,
				`public`,
				`thumb`,
				`time`)
				values
				(
					'".self::$db->real_escape_string($data['name'])."',
					'".self::$db->real_escape_string($data['description'])."',
					'".self::$db->real_escape_string($data['content'])."',
					'{$data['userid']}',
					'{$data['categoryid']}',
					'{$data['public']}',
					'{$data['thumb']}',
					'".time()."'
					)");
					$insertid = self::$db->insert_id;
					return $insertid;
				}
				public function exist_post($name, $except = 0){
					$query=self::$db->query("SELECT * FROM `post` WHERE `name` = '{$name}' && `postid` != $except LIMIT 1");
					return $query->num_rows > 0 ? true : false;
				}
			}
			?>
