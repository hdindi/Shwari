<?php
class SelectList
{

 
        public function ShowCategory()
        {
            $sql = "SELECT * FROM chapters";
            $res = mysql_query($sql);
            $category = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $category .= '<option value="' . $row['col1'] . '">' . $row['col2'] . '</option>';
            }
            return $category;
        }
 
        public function ShowType()
        {
            $sql = "SELECT * FROM codes WHERE col4=$_POST[id]";
            $res = mysql_query($sql);
            $type = '<option value="0">choose...</option>';
            while($row = mysql_fetch_array($res))
            {
                $type .= '<option value="' . $row['id'] . '">' . $row['col9'] . '</option>';
            }
            return $type;
        }
}
 
$opt = new SelectList();

?>