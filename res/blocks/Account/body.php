<?php
$userDetails = new userDetails();
echo "<script>userCountry = '" . $userDetails->country . "'</script>";
$productFilters = new productFilters();

$allUserDetails = new allUserDetails();
$allProducts = new allProducts();

$orders = new orders($userDetails->username);

?>



<div class="body">
    <div class="bInner cont">
        <div class="biLeft">
            <div class="bilLink bilLinkBlock text-big-size">Meine Konto</div>
            <?php if($_SESSION['role'] == 'admin'): ?>
                <div class="bilLink bilLinkBlock text-big-size">Konten</div>
                <div class="bilLink bilLinkBlock text-big-size">Produkte</div>
                <div class="bilLink bilLinkBlock text-big-size">Produkt hinzufügen</div>
                <?php endif; ?>
            <div class="bilLink bilLinkBlock text-big-size">Bestellungen</div>
            <a href='logout' class="bilLink text-big-size">Abmelden</a>
        </div>
        <div class="biRight">
            <div class="birSection birSection0 reveal active fade-bottom" style='display: none'>
                <div class="birs0Header header-size">Meine Konto</div>
                <form action="config/dbaccess" method="POST" class="birs0Form" id='accForm'>
                    <select name="salutation" class="bifiSelect bifiInput" id='salutation'>
                        <option value="false" disabled="" selected="" hidden="" id="optionDesabled">Salutation</option>
                        <option value="Herr" <?php if($userDetails->salutation == 'Herr'){echo "selected";} ?>>Herr</option>
                        <option value="Frau" <?php if($userDetails->salutation == 'Frau'){echo "selected";} ?>>Frau</option>
                    </select>
                    <div class="bifiDouble">
                        <input type="text" name='fName' class="bifiInput" placeholder='Vorname' minlength="3" value="<?=$userDetails->first_name?>" required>
                        <input type="text" name='lName' class="bifiInput" placeholder='Nachname' minlength="3" value="<?=$userDetails->last_name?>" required>
                    </div>
                    <input type="text" name='address' class="bifiInput" placeholder='Addresse' minlength="3" value="<?=$userDetails->address?>" required>
                    <div class="bifiDouble">
                        <input type="text" name='zip' class="bifiInput" placeholder='PLZ' minlength="2" value="<?=$userDetails->zip?>" required>
                        <select name="country" class="bifiSelect bifiInput"  id='country' selected='AF'>
                            <option value="false" disabled="" selected="" hidden="" id="optionDesabled">Land</option>
                            <?php include 'res/blocks/Register/countries_list.php'; ?>
                        </select>
                    </div>
                    <input type="email" name='email' class="bifiInput" placeholder='Email' value="<?=$userDetails->email?>" readonly>
                    <input type="text" name='username' class="bifiInput" placeholder='Benutzername' minlength="4" value="<?=$userDetails->username?>" readonly>
                    <input type="password" name='passCur' class="bifiInput" placeholder='Aktuelles Passwort' id='passCur' minlength="4">
                    <input type="password" name='pass' class="bifiInput" placeholder='Neue Passwort' id='pass' minlength="4">
                    <input type="password" name='passRep' class="bifiInput" placeholder='Passwort wiederholen' id='passRep' minlength="4">
                    <input type="text" style='display: none' name='formType' value='changeDetails'>
                    <input type="submit" class='bifiInput bifiSubmit' value='Change' id='submit'>
                </form>
            </div>
            <?php if($_SESSION['role'] == 'admin'): ?>
                <div class="birSection birSection1 reveal active fade-bottom" style='display: none'>
                    <form action="config/dbaccess" method='POST'>
                        <div class="birs0Header header-size">Konten</div>
                        <div class="birs1TableHolder">

                            <table class="birs1Table">
                            <tr>
                                <th>ID</th>
                                <th>Benutzername</th>
                                <th>E-Mail</th>
                                <th>Registrierungsdatum</th>
                                <th>Anrede</th>
                                <th>Vorname</th>
                                <th>Nachname</th>
                                <th>Adresse</th>
                                <th>Postleitzahl</th>
                                <th>Land</th>
                                <th>Rolle</th>
                                <th>Aktiv</th>
                            </tr>




                                <?php
                                    for($i = 0; $i < count($allUserDetails->allUsers); $i++){
                                        $html = '';
                                        if($allUserDetails->allUsers[$i][4] == 'Herr'){
                                            $salOptions = "
                                                <option value='Herr' selected>Herr</option>
                                                <option value='Frau'>Frau</option>
                                            ";
                                        }else{
                                            $salOptions = "
                                                <option value='Herr'>Herr</option>
                                                <option value='Frau' selected>Frau</option>
                                            ";
                                        }

                                        if($allUserDetails->allUsers[$i][10] == 'user'){
                                            $roleOptions = "
                                                <option value='user' selected>user</option>
                                                <option value='admin'>admin</option>
                                            ";
                                        }else{
                                            $roleOptions = "
                                                <option value='user'>user</option>
                                                <option value='admin' selected>admin</option>
                                            ";
                                        }

                                        if($allUserDetails->allUsers[$i][11] == 'true'){
                                            $activeOptions = "
                                                <option value='true' selected>true</option>
                                                <option value='false'>false</option>
                                            ";
                                        }else{
                                            $activeOptions = "
                                                <option value='true'>true</option>
                                                <option value='false' selected>false</option>
                                            ";
                                        }



                                        $html .= "
                                            <tr>
                                                <td><input type='text' name='v0-".$i."' value='" . $allUserDetails->allUsers[$i][0] . "' readonly></td>
                                                <td><input type='text' name='v1-".$i."' value='" . $allUserDetails->allUsers[$i][1] . "'></td>
                                                <td><input type='text' name='v2-".$i."' value='" . $allUserDetails->allUsers[$i][2] . "'></td>
                                                <td><input type='text' name='v3-".$i."' value='" . $allUserDetails->allUsers[$i][3] . "'></td>
                                                <td>
                                                    <select name='v4-".$i."'>
                                                        ".$salOptions."
                                                    </select>
                                                </td>
                                                <td><input type='text' name='v5-".$i."' value='" . $allUserDetails->allUsers[$i][5] . "'></td>
                                                <td><input type='text' name='v6-".$i."' value='" . $allUserDetails->allUsers[$i][6] . "'></td>
                                                <td><input type='text' name='v7-".$i."' value='" . $allUserDetails->allUsers[$i][7] . "'></td>
                                                <td><input type='text' name='v8-".$i."' value='" . $allUserDetails->allUsers[$i][8] . "'></td>
                                                <td><input type='text' name='v9-".$i."' value='" . $allUserDetails->allUsers[$i][9] . "'></td>
                                                <td>
                                                    <select name='v10-".$i."'>
                                                        ".$roleOptions."
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name='v11-".$i."'>
                                                        ".$activeOptions."
                                                    </select>
                                                </td>
                                            </tr>
                                        ";
                                        echo $html;

                                        if($i == count($allUserDetails->allUsers) - 1){
                                            echo "<input type='text' style='display: none' name='totalAccounts' value='".($i+1)."'>";
                                        }
                                    }
                                ?>
                            </table>
                        </div>
                        <input type="text" style='display: none' name='formType' value="adminAccounts">
                        <input type="submit" class="birs1Save" value="Save changes">
                    </form>
                </div>


                <div class="birSection birSection2 reveal active fade-bottom" style='display: none'>
                    <form action="config/dbaccess" method='POST'>
                        <div class="birs0Header header-size">Products</div>
                        <div class="birs1TableHolder">
                            <table class="birs1Table">
                                <tr>
                                <th>ID</th>
                                    <th>Produktname</th>
                                    <th>Titel</th>
                                    <th>Beschreibung</th>
                                    <th>Kategorie</th>
                                    <th>Geschlecht</th>
                                    <th>Farbe</th>
                                    <th>Preis</th>
                                    <th>Bilddateiname</th>
                                    <th>Löschen</th>
                                </tr>
                                <?php
                                    for($i = 0; $i < count($allProducts->allProducts); $i++){
                                        $html = '';

                                        
                                        $cat_html = "";
                                        for($k = 0; $k < count($productFilters->category); $k++){
                                            if($productFilters->category[$k] == $allProducts->allProducts[$i][4]){
                                                $cat_html .= "<option value='" . $productFilters->category[$k] . "' selected>" . $productFilters->category[$k] . "</option>";
                                            }else{
                                                $cat_html .= "<option value='" . $productFilters->category[$k] . "'>" . $productFilters->category[$k] . "</option>";
                                            }
                                        }

                                        $gender_html = "";
                                        for($k = 0; $k < count($productFilters->gender); $k++){
                                            if($productFilters->gender[$k] == $allProducts->allProducts[$i][5]){
                                                $gender_html .= "<option value='" . $productFilters->gender[$k] . "' selected>" . $productFilters->gender[$k] . "</option>";
                                            }else{
                                                $gender_html .= "<option value='" . $productFilters->gender[$k] . "'>" . $productFilters->gender[$k] . "</option>";
                                            }
                                        }

                                        $color_html = "";
                                        for($k = 0; $k < count($productFilters->color); $k++){
                                            if($productFilters->color[$k] == $allProducts->allProducts[$i][6]){
                                                $color_html .= "<option value='" . $productFilters->color[$k] . "' selected>" . $productFilters->color[$k] . "</option>";
                                            }else{
                                                $color_html .= "<option value='" . $productFilters->color[$k] . "'>" . $productFilters->color[$k] . "</option>";
                                            }
                                        }

                                        $html .= "
                                            <tr>
                                                <td><input type='text' name='v0-".$i."' value='" . $allProducts->allProducts[$i][0] . "' readonly></td>
                                                <td><input type='text' name='v1-".$i."' value='" . $allProducts->allProducts[$i][1] . "'></td>
                                                <td><input type='text' name='v2-".$i."' value='" . $allProducts->allProducts[$i][2] . "'></td>
                                                <td><input type='text' name='v3-".$i."' value='" . $allProducts->allProducts[$i][3] . "'></td>
                                                <td>
                                                    <select name='v4-".$i."'>
                                                        " . $cat_html . "
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name='v5-".$i."'>
                                                        " . $gender_html . "
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name='v6-".$i."'>
                                                        " . $color_html . "
                                                    </select>
                                                </td>
                                                <td><input type='text' name='v7-".$i."' value='" . $allProducts->allProducts[$i][7] . "'></td>
                                                <td><input type='text' name='v8-".$i."' value='" . $allProducts->allProducts[$i][8] . "' readonly></td>
                                                <td>
                                                    <select name='v9-".$i."'>
                                                        <option value='false' selected>No</option>
                                                        <option value='true'>Yes</option>
                                                    </select>
                                                </td>
                                            </tr>
                                        ";
                                        echo $html;

                                        if($i == count($allProducts->allProducts) - 1){
                                            echo "<input type='text' style='display: none' name='totalProducts' value='".($i+1)."'>";
                                        }
                                    }
                                ?>
                            </table>
                        </div>
                        <input type="text" style='display: none' name='formType' value="adminProducts">
                        <input type="submit" class="birs1Save" value="Save changes">
                    </form>
                </div>


                <div class="birSection birSection3 reveal active fade-bottom" style='display: none'>
                    <form action="config/dbaccess" method='POST' enctype="multipart/form-data">
                        <div class="birs0Header header-size">Produkt hinzufügen</div>
                        <div class="birs1TableHolder">
                            <table class="birs1Table">
                                <tr>
                                <th>Produktname</th>
                                <th>Titel</th>
                                <th>Beschreibung</th>
                                <th>Kategorie</th>
                                <th>Geschlecht</th>
                                <th>Farbe</th>
                                <th>Preis</th>
                                <th>Bilddatei</th>
                                <th>Dateiname</th>
                            </tr>
                                <tr>
                                    <td><input type='text' name='v0' value=''></td>
                                    <td><input type='text' name='v1' value=''></td>
                                    <td><input type='text' name='v2' value=''></td>
                                    <td>                                
                                        <select name='v3'>
                                            <?php
                                                for($i = 0; $i < count($productFilters->category); $i++){
                                                    echo "<option value='".$productFilters->category[$i]."'>".$productFilters->category[$i]."</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td>                                
                                        <select name='v4'>
                                            <?php
                                                for($i = 0; $i < count($productFilters->gender); $i++){
                                                    echo "<option value='".$productFilters->gender[$i]."'>".$productFilters->gender[$i]."</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td>                                
                                        <select name='v5'>
                                            <?php
                                                for($i = 0; $i < count($productFilters->color); $i++){
                                                    echo "<option value='".$productFilters->color[$i]."'>".$productFilters->color[$i]."</option>";
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    <td><input type='text' name='v6' value=''></td>
                                    <td><input type='file' name='v7' id='v6' accept="image/*" style='border:none'></td>
                                    <td><input type='text' name='v8' value=''></td>
                                </tr>
                            </table>
                        </div>
                        <input type="text" style='display: none' name='formType' value="adminAddProduct">
                        <input type="submit" class="birs1Save" value="Add product">
                    </form>
                </div>
            <?php endif; ?>
            <div class="birSection birSection3 reveal active fade-bottom" style='display: none'>

                    <div class="birs0Header header-size">Orders</div>
                    <div class="birs1TableHolder">
                        <table class="birs1Table">
                            <tr>
                                <th>Titel</th>
                                <th>Kategorie</th>
                                <th>Geschlecht</th>
                                <th>Farbe</th>
                            </tr>
                            <?php
                                for($i = 0; $i < count($orders->orders); $i++){
                                    echo "
                                    <tr>
                                        <td>".$orders->orders[$i]['product_title']."</td>
                                        <td>".$orders->orders[$i]['product_category']."</td>
                                        <td>".$orders->orders[$i]['product_gender']."</td>
                                        <td>".$orders->orders[$i]['product_color']."</td>
                                    </tr>
                                    ";
                                }
                            ?>
                        </table>
                    </div>

            </div>
        </div>
    </div>
</div>







<?php
if(isset($_SESSION['changeErr'])){
    if($_SESSION['changeErr'] == 'pass'){
        echo "<script>setTimeout(function(){alert('Previous password is incorrect')}, 200)</script>";
    }else if($_SESSION['changeErr'] == 'passNull'){
        echo "<script>setTimeout(function(){alert('New password can't be empty')}, 200)</script>";
    }
}
if(isset($_SESSION['changeSuc'])){
    echo "<script>setTimeout(function(){alert('Successfully updated')}, 200)</script>";
}

unset($_SESSION['changeErr']);
unset($_SESSION['changeSuc']);
?>