<?= $this->extend("_pattern") ?>

<?= $this->section("main") ?>

<div class="slds-box slds-p-around_xxx-small"
    style="width: 27%; background-color: white; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
    <div class="slds-grid slds-grid_vertical">
        <div class="slds-col">
            <div class="slds-text-heading_large slds-text-align_center"><b>KSAV</b></div>
        </div>
        <form action="<?= url_to("loginCheck") ?>" method="post">
            <div class="slds-col slds-m-top_x-large">
                <div class="slds-grid slds-grid_vertical">
                    <div class="slds-col">
                        <div class="slds-form-element">
                            <label class="slds-form-element__label" for="login">Email <abbr class="slds-required" title="required">* </abbr></label>
                            <div class="slds-form-element__control">
                                <input type="text" id="login" name="login" required="" class="slds-input" />
                            </div>
                        </div>
                    </div>
                    <div class="slds-col slds-m-top_medium">
                        <div class="slds-form-element">
                        <label class="slds-form-element__label" for="password">Mot de passe <abbr class="slds-required" title="required">* </abbr></label>
                            <div class="slds-form-element__control">
                                <input type="password" id="password" name="password" required="" class="slds-input" />
                            </div>
                        </div>
                    </div>
                    <div class="slds-col slds-m-top_medium">
                        <button class="slds-button slds-button_brand">Se connecter</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>