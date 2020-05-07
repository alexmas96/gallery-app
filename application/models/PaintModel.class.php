<?php
class PaintModel extends AbstractModel
{
    public function getAll()
    {
        $request = 'SELECT paints.Id,paints.Name,paints.Description,paints.Photo,category.Category_Name,category.Id as Category_Id,theme.Theme_Name, theme.Id as Theme_Id, paints.Height, paints.Width
         FROM paints
         LEFT JOIN category ON paints.Category_Id = category.Id 
         LEFT JOIN theme ON paints.Theme_Id = theme.Id';

        return $this->db->query($request);
    }

    
    public function getByCategoryId($id){

        $request = 'SELECT
				Id,
				paints.Name,
				Photo,
				paints.Description,
				Category_Id,
                Theme_Id
                FROM paints
                WHERE Category_Id = ?';

        return $this->db->query($request,[$id]);
    }
    
    public function getByThemeId($id){

        $request = 'SELECT
				Id,
				paints.Name,
				Photo,
				paints.Description,
				Category_Id,
                Theme_Id
                FROM paints
                WHERE Theme_Id = ?';

        return $this->db->query($request,[$id]);
    }

    

    public function getPaintById($id)
    {
        $request = 'SELECT paints.Id,paints.Name,paints.Description,paints.Photo,category.Category_Name,category.Id as Category_Id,theme.Theme_Name, theme.Id as Theme_Id, paints.Height, paints.Width, paints.Availability
         FROM paints
         LEFT JOIN category ON paints.Category_Id = category.Id 
         LEFT JOIN theme ON paints.Theme_Id = theme.Id 
         WHERE paints.Id = ?';
         

        return $this->db->queryOne($request, [$id]);
    }

    public function removePaintById($id)
    {
        $request = 'DELETE FROM paints WHERE paints.Id = ?;';

        return $this->db->executeSql($request, [$id]);
    }
    
    public function addPaintToDb($photo){
        $fields = array(
            $_POST["name"],
            $_POST["desc"],
            $photo,
            $_POST["category"],
            $_POST["theme"],
            $_POST["width"],
            $_POST["height"],
            $_POST["availability"]
        );
        
        $request = 'INSERT INTO paints (paints.Name, paints.Description, paints.Photo, paints.Category_Id, paints.Theme_Id, paints.Width, paints.Height, paints.Availability) VALUES (?,?,?,?,?,?,?,?); ';
        
        $this->db->executeSql($request, $fields);
    }
    

    public function update($id){
        $fields = array(
            $_POST["name"],
            $_POST["desc"],
            $_POST["category"],
            $_POST["theme"],
            $_POST["width"],
            $_POST["height"],
            $_POST["availability"],
            $id,
        );
        $request = 'UPDATE paints 
                    SET paints.Name = ?, 
                        paints.Description = ?, 
                        paints.Category_Id = ?, 
                        paints.Theme_Id = ?,
                        paints.Width = ?,
                        paints.Height = ?,
                        paints.Availability = ?
                        
                    WHERE paints.Id = ?';
        
        $this->db->executeSql($request, $fields);
    }
    public function update2($id){
        $fields = array(
            $_POST["name"],
            $_POST["desc"],
            $_POST["category"],
            $_POST["theme"],
        );
        
        $request = 'UPDATE paints SET (paints.Name, paints.Description, paints.Category_Id, paints.Theme_Id) VALUES (?,?,?,?)
        WHERE paints.Id ='.$id;
        
        $this->db->executeSql($request, $fields);
    }
    public function getLastThree(){
        
        $request = 'SELECT * FROM paints ORDER BY ID DESC LIMIT 3';
        
        return $this->db->query($request);
    }
    public function getLast(){
        
        $request = 'SELECT * FROM paints ORDER BY ID DESC LIMIT 1';
        
        return $this->db->query($request);
    }
        
}
