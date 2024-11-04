<?php
namespace App\Html;
 
use App\Html\AbstractPage;  
 
class PageCounties extends AbstractPage
{
  static function table(array $entities){
    echo '<h1>Megyék</h1>';
    self::searchBar();
    echo '<table id="counties-table">';
    self::tableHead();
    self::tableBody($entities);
    echo "</table>";
    self::addModal();
    self::editModal();
}
 
    static function tableHead()
    {
        echo '
        <thead>
            <tr>
                <th class="id-col">#</th>
                <th>Megnevezés</th>
                <th style="float: right; display: flex">
                    Művelet&nbsp;
                    <button id="myBtn">+</button>
                </th>
            </tr>
            <tr id="editor" class="hidden">
            </tr>
        </thead>';
    }
 
    static function editor() {
        echo '
        <form name="county-editor" method="post" action="">
            <input type="hidden" id="id" name="id">
            <input type="search" id="name" name="name" placeholder="Megye" required>
            <button type="submit" id="btn-save-county" name="btn-save-county" title="Ment"><i class="fa fa-save"></i></button>
        </form>';
    }

    static function addModal() {
      echo '
      <div id="addModal" class="modal">
          <div class="modal-content">
              <span class="close">&times;</span>
              <h2>Új megye hozzáadása</h2>
              <form name="county-add" method="post" action="">
                  <input type="hidden" id="add-id" name="id">
                  <input type="search" id="add-name" name="name" placeholder="Megye" required>
                  <button type="submit" id="btn-save-county" name="btn-save-county" title="Ment"><i class="fa fa-save"></i></button>
                  <button type="button" id="btn-cancel-add" title="Mégse"><i class="fa fa-times"></i></button>
              </form>
          </div>
      </div>';
  }

  static function editModal() {
      echo '
      <div id="editModal" class="modal">
          <div class="modal-content">
              <span class="close">&times;</span>
              <h2>Megye szerkesztése</h2>
              <form name="county-edit" method="post" action="">
                  <input type="hidden" id="edit-id" name="id">
                  <input type="search" id="edit-name" name="name" placeholder="Megye" required>
                  <button type="submit" id="btn-update-county" name="btn-update-county" title="Ment"><i class="fa fa-save"></i></button>
                  <button type="button" id="btn-cancel-edit" title="Mégse"><i class="fa fa-times"></i></button>
              </form>
          </div>
      </div>';
  }
 
  static function tableBody(array $entities) {
    echo '<tbody>';
    $i = 0;
    foreach ($entities as $entity) {
        echo "
        <tr class='" . (++$i % 2 ? "odd" : "even") . "'>
            <td>{$entity['id']}</td>
            <td>{$entity['name']}</td>
            <td class='flex'>
                <button type='button'
                    class='btn-edit-county'
                    data-id='{$entity['id']}'
                    data-name='{$entity['name']}'
                    title='Szerkesztés'>
                    <i class='fa fa-edit'></i>
                </button>
                <form method='post' action=''>
                    <button type='submit' 
                        id='btn-del-county-{$entity['id']}' 
                        name='btn-del-county' 
                        value='{$entity['id']}' 
                        title='Töröl'>
                        <i class='fa fa-trash'></i>
                    </button>
                </form>
            </td>
        </tr>";
    }
    echo '</tbody>';
}
}