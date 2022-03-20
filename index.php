<?php 
class QueryBuilder
{
    public $dsn = "mysql:host=localhost;dbname=coding-academy";
    public $username = "root";
    public $pass = "";
    private $pdo;ج
    private $finalQuery;

    /**
     * @param $pdo
     */
    public function __construct()
    {
        $this->pdo = new PDO($this->dsn, $this->username, $this->pass);
        echo "Connected successfully to DB";
    }

    public function select($columns = "*")
    {
    }

    public function update($table)
    {
        return $this;
    }

    public function delete()
    {
        return $this;
    }

    public function insert()
    {
         return $this;
    }

    public function orderBy()
    {
        $this->finalQuery ="select $columns from $tablel  left join $able2 on $condition";
        return $this;
    }

    public function count()
    {
        $this->finalQuery ="select $columns from $tablel  left join $able2 on $condition";
        return $this;
    }

    public function limit()
    {
        $this->finalQuery ="select $columns from $tablel  left join $able2 on $condition";
        return $this;
    }

    public function innerJoin($columns,$table,$table2,$condition)
    {
        $this->finalQuery ="select $columns from $tablel  left join $able2 on $condition";
        return $this;
    }

    public function leftJoin()
    {
        $this->finalQuery ="select $columns from $tablel  left join $able2 on $condition";
        return $this;
    }

    public function rightJoin()
    {
        $this->finalQuery ="select $columns from $tablel  left join $able2 on $condition";
        return $this;
    }

    public function runQuery()
    {
//        $stm = $this->pdo->prepare('select * from users where id=4 order by id desc ');
        $stm = $this->pdo->prepare($this->finalQuery);
        $stm->execute();
        return $stm->fetchAll(PDO::FETCH_OBJ);
    }
}
?>