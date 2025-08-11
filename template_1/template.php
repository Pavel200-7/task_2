<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
{
    die();
}
?>
<?php if ($arResult["isFormErrors"] == "Y"):?>
    <?=$arResult["FORM_ERRORS_TEXT"];?>
<?php endif; ?>
<?= $arResult["FORM_NOTE"] ?? '' ?>
<?php if ($arResult["isFormNote"] != "Y"): // isFormNote?>
    <?=$arResult["FORM_HEADER"]?>
    <div class="contact-form">
        <?php if ($arResult["isFormDescription"] == "Y" || $arResult["isFormTitle"] == "Y"): //IsContact-form__head?>
            <div class="contact-form__head">
                <?php if ($arResult["isFormTitle"]): ?>
                    <div class="contact-form__head-title"><?=$arResult["FORM_TITLE"]?></div>
                <?php endif; ?>
                <?php if ($arResult["isFormDescription"]): ?>
                    <div class="contact-form__head-text"><?=$arResult["FORM_DESCRIPTION"]?></div>
                <?php endif; ?>
            </div>
        <?php endif; //IsContact-form__head?>
        <form class="contact-form__form" action="#" method="POST">
            <div class="contact-form__form-inputs">
                <?php foreach ($arResult["QUESTIONS"] as $FIELD_SID => $arQuestion) { //foreach Questions?>
                    <?php if ($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] == 'hidden'): ?>
                        <?php echo $arQuestion["HTML_CODE"]; ?>
                    <?php elseif($arQuestion['STRUCTURE'][0]['FIELD_TYPE'] !== 'textarea'): ?>
                        <div class="input contact-form__input">
                            <label class="input__label" for="medicine_name">
                                <div class="input__label-text"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></div>
                                <?=$arQuestion["HTML_CODE"]?>
                                <?php if (isset($arResult["FORM_ERRORS"][$FIELD_SID])): ?>
                                    <div class="input__notification"><?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?></div>
                                <?php endif; ?>
                            </label>
                        </div>
                    <?php else:?>
                        <div class="contact-form__form-message">
                            <div class="input">
                                <label class="input__label" for="medicine_message">
                                    <div class="input__label-text"><?=$arQuestion["CAPTION"]?><?if ($arQuestion["REQUIRED"] == "Y"):?><?=$arResult["REQUIRED_SIGN"];?><?endif;?></div>
                                    <?=$arQuestion["HTML_CODE"]?>
                                    <?php if (isset($arResult["FORM_ERRORS"][$FIELD_SID])): ?>
                                        <div class="input__notification"><?=htmlspecialcharsbx($arResult["FORM_ERRORS"][$FIELD_SID])?></div>
                                    <?php endif; ?>
                                </label>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php } //end foreach Questions?>
                <div class="contact-form__bottom">
                    <div class="contact-form__bottom-policy">Нажимая &laquo;Отправить&raquo;, Вы&nbsp;подтверждаете, что ознакомлены, полностью согласны и&nbsp;принимаете условия &laquo;Согласия на&nbsp;обработку персональных данных&raquo;.</div>
                    <div class="submit-wrapper"><input <?=(intval($arResult["F_RIGHT"]) < 10 ? "disabled=\"disabled\"" : "");?> type="submit" name="web_form_submit" value="<?=htmlspecialcharsbx(trim($arResult["arForm"]["BUTTON"]) == '' ? GetMessage("FORM_ADD") : $arResult["arForm"]["BUTTON"]);?>" /></div>
                </div>
            </div>
        </form>
    </div>
<?php endif; // isFormNote ?>
