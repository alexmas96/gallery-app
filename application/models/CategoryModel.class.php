<?php
class CategoryModel extends AbstractModel
{

    // recupere toutes les categories
    public function getAll()
    {
        $request = 'SELECT
				*
				FROM category';

        return $this->db->query($request);
    }
    //met a jour le nom d'une categorie a un id donné
    public function update($name, $id)
    {
        $request = 'UPDATE category SET Category_Name=? WHERE category.Id = ?';
        
        return $this->db->executeSql($request, [$name, $id]);
    }
    // ajoute une nouvelle categorie
    public function add($name)
    {
        $request = 'INSERT INTO category (Category_Name) VALUES (?)';
        
        return $this->db->executeSql($request, [$name]);
    }
    //supprime le nom d'une categorie a un id donné
    public function removeById($id)
    {
        $request = 'DELETE FROM category WHERE category.Id =?';
        
        return $this->db->executeSql($request, [$id]);
    }
}
