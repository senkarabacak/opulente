<?php
$filters = new productFilters();
?>








<div class="products">
    <div class="pInner">
        <div class="piHeader header-size w500">Produkte</div>
        <div class="piProducts">
            <div class="pipFilters">
                <input type="text" class="pipfSearch f16 w500" id='pipfSearch'>
                <div class="pipfCategories">
                    <div class="pipfcCategory">

                        <div class="pipfccItem">
                            <button aria-expanded="true">
                                <span class="pipfcciTitle f20 w600">Filter</span>
                                <div class="pipfcciImgHolder">
                                    <svg width="14" height="9" viewBox="0 0 14 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1 1L7 8L13 1" stroke="#34241E" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </div>
                            </button>
                            <div class="pipfcciContent">
                                <div class="pipfccicField">
                                    <div class="pipfccicfHeader text-big-size w500">Typ</div>
                                    <div class="pipfccicfFilter">
                                        <input type="checkbox" class="pipfccicffCheckbox">
                                        <div class="pipfccicffcName f16 w500">Alle Typ</div>
                                    </div>
                                    <?php
                                        for($i = 0; $i < count($filters->category); $i++){
                                            echo "
                                                <div class='pipfccicfFilter'>
                                                    <input type='checkbox' class='pipfccicffCheckbox'>
                                                    <div class='pipfccicffcName f16 w500'>" . ucfirst($filters->category[$i]) . "</div>
                                                </div>
                                            ";
                                        }
                                    ?>
                                </div>
                                <div class="pipfccicField">
                                    <div class="pipfccicfHeader text-big-size w500">Farbe</div>
                                    <div class="pipfccicfFilter">
                                        <input type="checkbox" class="pipfccicffCheckbox">
                                        <div class="pipfccicffcName f16 w500">Alle Farbe</div>
                                    </div>
                                    <?php
                                        for($i = 0; $i < count($filters->color); $i++){
                                            echo "
                                                <div class='pipfccicfFilter'>
                                                    <input type='checkbox' class='pipfccicffCheckbox'>
                                                    <div class='pipfccicffcName f16 w500'>" . ucfirst($filters->color[$i]) . "</div>
                                                </div>
                                            ";
                                        }
                                    ?>
                                </div>
                                <div class="pipfccicField">
                                    <div class="pipfccicfHeader text-big-size w500">Geschlecht</div>
                                    <div class="pipfccicfFilter">
                                        <input type="checkbox" class="pipfccicffCheckbox">
                                        <div class="pipfccicffcName f16 w500">Alle Geschlechte</div>
                                    </div>
                                    <?php
                                        for($i = 0; $i < count($filters->gender); $i++){
                                            echo "
                                                <div class='pipfccicfFilter'>
                                                    <input type='checkbox' class='pipfccicffCheckbox'>
                                                    <div class='pipfccicffcName f16 w500'>" . ucfirst($filters->gender[$i]) . "</div>
                                                </div>
                                            ";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="pipProducts" id='pipProducts'>
                <!-- <div class="pippProduct">
                    <a href=""><img src="productpictures/dress-red-t0.png" alt="" class="pipppImg"></a>
                    <div class="pipppTitle text-extrabig-size w500">Blossom</div>
                    <div class="pipppDescription text-small-size">A floral-inspired, feminine garment with a romantic and whimsical touch</div>
                    <div class="pipppPrice text-small-size w600">$100</div>
                </div> -->
            </div>
        </div>
    </div>
</div>