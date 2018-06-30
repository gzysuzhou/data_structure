<?php
/**
 * Created by PhpStorm.
 * User: suzhou
 * Date: 2018/6/30
 * Time: 8:21
 */
namespace structure;
class Node{
    public $id;//节点id
    public $value;//节点值
    public $next;//下一节点
    public function __construct($id, $value)
    {
        $this->id = $id;
        $this->value = $value;
        $this->next = null;
    }
}

class LinkedList
{
    public $head = null;
    public $size = 0;

    public function __construct($id, $value)
    {
        $this->head  = new Node($id, $value);
        $this->size++;
    }

    public function getSize(){
        return $this->size;
    }

    public function isEmpty(){
        return $this->size == 0;
    }

    public function add(Node $node)
    {
        $current = $this->head;
        while($current->next != null){
            if($current->next->id > $node->id){
                break;
            }
            $current = $current->next;
        }
        $node->next = $current->next;
        $current->next = $node;
        $this->size++;

    }

    public function del($id)
    {
        $current = $this->head;
        if ($this->head->id == $id){
            $this->head = $this->head->next;
            $this->size--;
            return true;
        }
        $flag = false;
        while ($current->next != null){
            if($current->next->id == $id){
               $flag = true;
               break;
            }
            $current = $current->next;
        }
        if($flag){
            $current->next = $current->next->next;
            $this->size--;
        } else {
            exit('没有找到要删除的节点');
        }

    }


}
$linkedList = new LinkedList(5,5);
$linkedList ->add(new node(4,4));
$linkedList ->add(new node(3,3));
$linkedList ->add(new node(2,2));
$linkedList ->add(new node(0,0));
$linkedList ->add(new node(1,1));
$linkedList->del(2);
$linkedList->del(4);
$linkedList->del(5);
var_dump($linkedList);
