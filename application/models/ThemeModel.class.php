<?php
class ThemeModel extends AbstractModel
{
    // recupere tout les themes
    public function getAll()
    {
        $request = 'SELECT
				*
				FROM theme';

        return $this->db->query($request);
    }
    //met a jour le nom d'un theme a un id donné
    public function update($name, $id)
    {
        $request = 'UPDATE theme SET Theme_Name=? WHERE theme.Id = ?';
        
        return $this->db->executeSql($request, [filter_var($name, FILTER_SANITIZE_STRING), $id]);
    }
    // ajoute un nouveau theme
    public function add($name)
    {
        $request = 'INSERT INTO theme (Theme_Name) VALUES (?)';
        
        return $this->db->executeSql($request, [filter_var($name, FILTER_SANITIZE_STRING)]);
    }
    //supprime le nom d'un theme a un id donné
    public function removeById($id)
    {
        $request = 'DELETE FROM theme WHERE theme.Id =?';
        
        return $this->db->executeSql($request, [$id]);
    }
}
