<?= $this->extend("_pattern") ?>

<?= $this->section("main") ?>

<?= $this->include("templates/navigation") ?>

<div class="slds-box" style="width: 95% !important; background-color: white; margin: auto; margin-top: 20px;">
    <div style="display: flex; flex-direction: row; justify-content: space-between;">
        <h2 class="slds-text-heading_medium">
            <?= ($action == "add" ? "Ajouter un avis" : ("Modifier un avis : " . $id)) ?>
        </h2>
    </div>
    <hr style="margin: 30px 0;">
    <form action="<?= ($action == "add" ? url_to("reviewAdd") : "") ?>" method="post">
        <div class="slds-grid slds-grid_vertical">
            <div class="slds-col">
                <div class="slds-grid slds-gutters">
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="reservation_review">N°Reservation<abbr
                                    class="slds-required">*</abbr></label>
                            <div class="slds-form-element__control">
                                <input type="text" name="reservation_review" id="reservation_review" class="slds-input"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="travel-review">Voyage<abbr
                                    class="slds-required">*</abbr></label>
                            <div class="slds-form-element__control">
                                <div class="slds-select_container">
                                    <select class="slds-select" name="travel-review" id="travel-review" required>
                                        <option value="">-- Sélectionner un voyage --</option>
                                        <?php
                                        foreach ($travels as $travel) {
                                            echo "<option value='" . $travel["ID_MODELEVOYAGE"] . "'>" . $travel["NOM_MODELEVOYAGE"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="date_travel-review">Date Voyage<abbr
                                    class="slds-required">*</abbr></label>
                            <div class="slds-form-element__control">
                                <div class="slds-select_container">
                                    <select class="slds-select" name="date_travel-review" id="date_travel-review"
                                        required>
                                        <option value="">-- Sélectionner une date --</option>
                                        <?php
                                        foreach ($travels as $travel) {
                                            echo "<option value='" . $travel["ID_VOYAGE"] . "'>" . $travel["DATEDEPART_VOYAGE"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="date_travel-review">Client<abbr
                                    class="slds-required">*</abbr></label>
                            <div class="slds-form-element__control">
                                <input list="list_client-review" name="client-review" id="client-review"
                                    class="slds-input" value="<?= ($action == "add" ? "" : $data["NOM"]) ?>" required>
                            </div>
                            <datalist id="list_client-review" name="client-review" required>
                                <?php
                                foreach ($customers as $customer) {
                                    echo "<option value='" . $customer["IDCLIENT"] . "'>" . $customer["NOM"] . " " . $customer["PRENOM"] . "</option>";
                                }
                                ?>
                            </datalist>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="slds-col">
                <div class="slds-grid slds-gutters" style="padding: 0 70px; gap: 300px;">
                    <div class="slds-grid slds-grid_vertical">
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Transfert</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Hotel</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Restauration</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Service / Accueil</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Animation</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slds-grid slds-grid_vertical">
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Excursions / Guide</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Transport Aerien</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Transport Car</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Thalasso / SPA</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-grid slds-grid_pull-padded-medium">
                                <div class="slds-col slds-p-horizontal_medium">
                                    <span>Croisière</span>
                                </div>
                                <div class="slds-col slds-p-horizontal_medium">
                                    <div class="slds-form-element__control">
                                        <div class="slds-slider">
                                            <input type="range" id="slider-id-2" class="slds-slider__range" value="0" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="slds-grid slds-grid_vertical">
                        <div class="slds-col">
                            <div class="slds-form-element">
                                <label class="slds-form-element__label" for="description_model-travel">Points
                                    positifs<abbr class="slds-required">*</abbr></label>
                                <div class="slds-form-element__control">
                                    <textarea name="description_model-travel" id="description_model-travel"
                                        class="slds-textarea" style="height: 180px !important; resize: none;"
                                        required><?= ($action == "add" ? "" : $data["DESCRIPTION"]) ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="slds-col">
                            <div class="slds-form-element">
                                <label class="slds-form-element__label" for="description_model-travel">Points
                                    positifs<abbr class="slds-required">*</abbr></label>
                                <div class="slds-form-element__control">
                                    <textarea name="description_model-travel" id="description_model-travel"
                                        class="slds-textarea" style="height: 180px !important; resize: none;"
                                        required><?= ($action == "add" ? "" : $data["DESCRIPTION"]) ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="slds-col">
                    <div class="slds-grid slds-grid_vertical">
                        <div class="slds-col">
                            <div class="slds-clearfix">
                                <div class="slds-float_right">
                                    <a href="<?= url_to("reviewViewList") ?>"
                                        class="slds-button slds-button_outline-brand">Annuler</a>
                                    <input type="submit" class="slds-button slds-button_brand"
                                        value="<?= ($action == "add" ? "Ajouter" : "Modifier") ?>">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </form>
</div>

<?= $this->endSection() ?>