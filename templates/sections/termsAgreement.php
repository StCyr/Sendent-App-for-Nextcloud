<?php
/** @var $l \OCP\IL10N */
/** @var $_ array */
?>

<form class="termsAgreementForm" id="termsAgreementForm">
    <div id="termsAgreement" class="section">
        <h2>
            Sendent app for Nextcloud
        </h2>
        <h1>
            <?php p($l->t('Terms and conditions')); ?>    
        </h1>
        
        <div class="" id="termsAgreementMessage">
            <div class="">

                <div class="labelFullWidth" id="lblTermsAgreementMessage">
                    <?php p($l->t('Before you can use the Sendent app for Nextcloud, please read and agree with the terms and conditions.')); ?>

                    <br>
                    <a target="blank" style="color:blue;font-style: italic;" href="https://www.sendent.com/terms-and-conditions/"><?php p($l->t('Review terms and conditions'));?></a> 
                    <br>
                    <br>
                    <div class="settingkeyvalueinherited">
                        <input type="checkbox" class="settingkeyvalueinheritedcheckbox" id="termsAgreementCheckbox" name="termsAgreementCheckbox" value="yes"> 
                                   <span class="settingkeyvalueinheritedlabel" for="termsAgreementCheckbox"><?php p($l->t('I have read the terms and conditions and I agree.'));?></label>
                    </div>
                </div>
            </div>                    
        </div>
    </div>
</form>
