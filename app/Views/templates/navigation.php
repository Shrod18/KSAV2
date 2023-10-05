<div class="slds-context-bar">
    <div class="slds-context-bar__primary">
        <div
            class="slds-context-bar__item slds-context-bar__dropdown-trigger slds-dropdown-trigger slds-dropdown-trigger_click slds-no-hover">
            <div class="slds-context-bar__icon-action">
                <button class="slds-button slds-icon-waffle_container slds-context-bar__button"
                    title="Icon">
                    <span class="slds-icon-waffle">
                        <span class="slds-r1"></span>
                        <span class="slds-r2"></span>
                        <span class="slds-r3"></span>
                        <span class="slds-r4"></span>
                        <span class="slds-r5"></span>
                        <span class="slds-r6"></span>
                        <span class="slds-r7"></span>
                        <span class="slds-r8"></span>
                        <span class="slds-r9"></span>
                    </span>
                    <span class="slds-assistive-text">Open App Launcher</span>
                </button>
            </div>
            <span class="slds-context-bar__label-action slds-context-bar__app-name">
                <span class="slds-truncate" title="KSAV">KSAV</span>
            </span>
        </div>
    </div>
    <nav class="slds-context-bar__secondary" role="navigation">
        <ul class="slds-grid">
            <li class="slds-context-bar__item slds-is-active">
                <a href="#" class="slds-context-bar__label-action" title="Home">
                    <span class="slds-assistive-text">Page actuelle:</span>
                    <span class="slds-truncate" title="Home">Accueil</span>
                </a>
            </li>
            <li
                class="slds-context-bar__item slds-context-bar__dropdown-trigger slds-dropdown-trigger slds-dropdown-trigger_click" onclick="toggleTravel(this)">
                <a class="slds-context-bar__label-action" title="Travel">
                    <span class="slds-truncate" title="Travel">Voyages</span>
                </a>
                <div class="slds-context-bar__icon-action slds-p-left_none">
                    <button class="slds-button slds-button_icon slds-button_icon slds-context-bar__button"
                        aria-haspopup="true" title="OpenSubmenu">
                        <svg class="slds-button__icon" aria-hidden="true">
                            <use xlink:href="<?= base_url("resources/assets/icons/symbols.svg#chevrondown") ?>"></use>
                        </svg>
                        <span class="slds-assistive-text">Voyages</span>
                    </button>
                </div>
                <div class="slds-dropdown slds-dropdown_right">
                    <ul class="slds-dropdown__list" role="menu">
                        <li class="slds-dropdown__item" role="presentation">
                            <a href="#" role="menuitem" tabindex="-1">
                                <span class="slds-truncate" title="TravelModel">Modèle Voyages</span>
                            </a>
                        </li>
                        <li class="slds-dropdown__item" role="presentation">
                            <a href="#" role="menuitem" tabindex="-1">
                                <span class="slds-truncate" title="TravelInstance">Instance de Voyages</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="slds-context-bar__item">
                <a href="#" class="slds-context-bar__label-action" title="ReviewsCustomers">
                    <span class="slds-truncate" title="ReviewsCustomers">Avis Clients</span>
                </a>
            </li>
            <li class="slds-context-bar__item">
                <a href="#" class="slds-context-bar__label-action" title="Logout">
                    <span class="slds-truncate" title="Logout">Deconnexion</span>
                </a>
            </li>
        </ul>
    </nav>
</div>