<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
global $arHandBook,$statusCustomer;
$arUser = $arResult['arUser'];
$notAdded = $arHandBook['PROFILE_NOT_ADDED']['UF_VALUE'];
$lang = $_COOKIE['mi_lang'];
if(!$lang){
    $lang = 's1';
}
?>

<div class="profile__main">
<div class="profile__main-left"></div>
<div class="profile__main-center">
    <div class="profile__acc">
        <div class="profile__acc-status">
            <div class="profile__acc-status__title">
                <p><?=str_replace('#STATUS#',$statusCustomer,$arHandBook['PROFILE_STATUS_MAIN']['UF_VALUE'])?></p>
            </div>
            <div class="profile__acc-status__text">
                <p><?=$arHandBook['PROFILE_STATUS_INFO']['UF_VALUE']?></p>
            </div>
        </div>
        <div class="profile__acc-datas">
            <div class="profile__acc-box">
                <div class="profile__acc-box__title"><?=$arHandBook['PROFILE_BASIC']['UF_VALUE']?></div>
                <div class="profile__acc-box__section active">
                    <div class="profile__acc-box__wrap">
                        <div class="profile__acc-box__photo-wrap">
                            <div class="profile__acc-box__photo">
                                <?if($arUser['UF_PHOTO']){?>
									<div class="profile__acc-box__media">
										<img src="<?=CFile::GetPath($arUser['UF_PHOTO'])?>">
									</div>
                                <?}?>
                            </div>
                        </div>
                        <div class="profile__acc-box__list">
                            <div class="profile__acc-box__item">
                                <div class="profile__acc-box__item-param"><?=$arHandBook['SIGN_IN_NAME']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['NAME']?></div>
                            </div>
                            <div class="profile__acc-box__item">
                                <div class="profile__acc-box__item-param"><?=$arHandBook['SIGN_IN_LAST_NAME']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['LAST_NAME']?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['UF_GENDER']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_GENDER']['UF_VALUE']?></div>
                                <?
                                $gender = '';
                                 if($lang == 's2'){
                                     if($arUser['UF_GENDER'] == 'm'){
                                         $gender = 'Мужской';
                                     }
                                     if($arUser['UF_GENDER'] == 'w'){
                                         $gender = 'Женский';
                                     }
                                 }else{
                                     if($arUser['UF_GENDER'] == 'm'){
                                         $gender = 'Male';
                                     }
                                     if($arUser['UF_GENDER'] == 'w'){
                                         $gender = 'Female';
                                     }
                                 }
                                ?>
                                <div class="profile__acc-box__item-value"><?=$gender?:$notAdded?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['UF_BIRTHDAY']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_DATE_BIRTH']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['UF_BIRTHDAY']?:$notAdded?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['PERSONAL_STATE']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_COUNTRY']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['PERSONAL_STATE']?:$notAdded?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['PERSONAL_CITY']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_CITY']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['PERSONAL_CITY']?:$notAdded?></div>
                            </div>
                            <div class="profile__acc-box__item">
                                <div class="profile__acc-box__item-param"><?=$arHandBook['SIGN_IN_EMAIL']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['EMAIL']?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['PERSONAL_PHONE']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_PHONE']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['PERSONAL_PHONE']?:$notAdded?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['PERSONAL_NOTES']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_SCOPE']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['PERSONAL_NOTES']?:$notAdded?></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__acc-box__edit">
                        <a href="#" class="hoverMe edit_base_profile" data-attr="<?=$arHandBook['PROFILE_EDIT']['UF_VALUE']?>"><?=$arHandBook['PROFILE_EDIT']['UF_VALUE']?></a>
                    </div>
                </div>
                <div class="profile__acc-box__section">
                    <div class="profile__acc-box__wrap">
                        <form name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" method="POST" class="profile__acc-box__form validation_profile form_base_profile">
                            <?=$arResult["BX_SESSION_CHECK"]?>
                            <input type="hidden" name="lang" value="<?=LANG?>" />
                            <input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
							<input type="hidden" name="user" value="<?=$arUser['ID']?>">
							<input type="hidden" name="action" value="userInfoProfileUpdate">
                            <input type="file" name="UF_PHOTO1" value="" style="display:none" accept="image/png, image/gif, image/jpeg" />
                            <div class="profile__acc-box__photo-wrap">
                                <div class="profile__acc-box__photo">
                                    <div class="profile__acc-box__media">
                                        <img src="<?=CFile::GetPath($arUser['UF_PHOTO'])?>" alt="" <?if(!$arUser['UF_PHOTO']){?>style="display:none"<?}?>>
                                        <div class="profile__acc-box__photo-icon"></div>
                                    </div>
                                </div>
								<div class="profile__acc-box__photo-actions">
									<a href="#" class="profile__acc-box__photo-action" data-type="edit">
										<?=$arHandBook['PROFILE_PHOTO_EDIT']['UF_VALUE']?>
									</a>
									<a href="#" class="profile__acc-box__photo-action" data-type="delete">
										<?=$arHandBook['PROFILE_PHOTO_DELETE']['UF_VALUE']?>
									</a>
								</div>
                            </div>
                            <div class="profile__popup-form__wrap">
                                <div class="profile__popup-form__group __half input_group">
                                    <label for="firstname"><?=$arHandBook['SIGN_IN_NAME']['UF_VALUE']?></label>
                                    <input name="NAME" id="firstname" type="text" value="<?=$arUser['NAME']?>" required aria-required="true" data-rule-nonumber="true">
                                </div>
                                <div class="profile__popup-form__group __half input_group">
                                    <label for="lastname"><?=$arHandBook['SIGN_IN_LAST_NAME']['UF_VALUE']?></label>
                                    <input name="LAST_NAME" id="lastname" type="text" value="<?=$arUser['LAST_NAME']?>" required aria-required="true" data-rule-nonumber="true">
                                </div>
                                <div class="profile__popup-form__group __half popup__settings-login__select">
                                    <label for="gender"><?=$arHandBook['PROFILE_GENDER']['UF_VALUE']?></label>
<!--                                    <input name="UF_GENDER" id="gender" type="text" placeholder="Not added" value="--><?php //=$arUser['UF_GENDER']?><!--">-->
                                    <?if($lang == 's2'){?>
                                        <select name="UF_GENDER" id="gender" placeholder-text="<?=$arUser['UF_GENDER']?:'Мужской'?>">
                                            <option value="m" class="select-dropdown__list-item" <?if($arUser['UF_GENDER'] == 'm'){?>selected="selected"<?}?>>Mужской</option>
                                            <option value="w" class="select-dropdown__list-item" <?if($arUser['UF_GENDER'] == 'w'){?>selected="selected"<?}?>>Женский</option>
                                        </select>
                                    <?}else{?>
                                        <select name="UF_GENDER" id="gender" placeholder-text="<?=$arUser['UF_GENDER']?:'Male'?>">
                                            <option value="m" class="select-dropdown__list-item" <?if($arUser['UF_GENDER'] == 'm'){?>selected="selected"<?}?>>Male</option>
                                            <option value="w" class="select-dropdown__list-item" <?if($arUser['UF_GENDER'] == 'w'){?>selected="selected"<?}?>>Female</option>
                                        </select>
                                    <?}?>
                                </div>
                                <div class="profile__popup-form__group __half">
                                    <label for="datebirth"><?=$arHandBook['PROFILE_DATE_BIRTH']['UF_VALUE']?></label>
                                    <input name="UF_BIRTHDAY" id="datebirth" type="text" placeholder="<?=$notAdded;?>" value="<?=$arUser['UF_BIRTHDAY']?>">
                                </div>
                                <div class="profile__popup-form__group __half">
                                    <label for="country"><?=$arHandBook['PROFILE_COUNTRY']['UF_VALUE']?></label>
                                    <input name="PERSONAL_STATE" maxlength="15" id="country" type="text" placeholder="<?=$notAdded;?>" value="<?=$arUser['PERSONAL_STATE']?>">
                                </div>
                                <div class="profile__popup-form__group __half">
                                    <label for="city"><?=$arHandBook['PROFILE_CITY']['UF_VALUE']?></label>
                                    <input name="PERSONAL_CITY" maxlength="30" id="city" type="text" placeholder="<?=$notAdded;?>" value="<?=$arUser['PERSONAL_CITY']?>">
                                </div>
                                <div class="profile__popup-form__group __half input_group">
                                    <label for="email"><?=$arHandBook['SIGN_IN_EMAIL']['UF_VALUE']?></label>
                                    <input name="EMAIL" id="email" type="email" value="<?=$arUser['EMAIL']?>" required aria-required="true">
                                </div>
                                <div class="profile__popup-form__group __half input_group __inner-input">
                                    <label for="phone"><?=$arHandBook['PROFILE_PHONE']['UF_VALUE']?></label>
									<div class="profile__popup-form__group-input">
                                    	<input name="PERSONAL_PHONE" id="phone2" class="phone2" placeholder="<?=$notAdded;?>" type="text" value="<?=$arUser['PERSONAL_PHONE']?>">
									</div>
                                </div>
                                <div class="profile__popup-form__group">
                                    <label for="scope"><?=$arHandBook['PROFILE_SCOPE']['UF_VALUE']?></label>
                                    <input name="PERSONAL_NOTES" maxlength="70" id="scope" type="text" placeholder="<?=$notAdded;?>" value="<?=$arUser['PERSONAL_NOTES']?>">
                                </div>
                            </div>
							<button type="submit" name="save" value="<?=$arHandBook['PROFILE_SAVE']['UF_VALUE']?>" data-attr="<?=$arHandBook['PROFILE_SAVE']['UF_VALUE']?>" class="profile__popup-form__button hoverMe"><?=$arHandBook['PROFILE_SAVE']['UF_VALUE']?></button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="profile__acc-box">
                <div class="profile__acc-box__title"><?=$arHandBook['PROFILE_PROFESSIONAL']['UF_VALUE']?></div>
                <div class="profile__acc-box__text"><?=$arHandBook['PROFILE_COMPLETE_CAREER']['UF_VALUE']?></div>
                <div class="profile__acc-box__section active">
                    <div class="profile__acc-box__wrap">
                        <div class="profile__acc-box__list">
                            <div class="profile__acc-box__item" <?if(!$arUser['WORK_COMPANY']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_ORG']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['WORK_COMPANY']?:$notAdded?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['UF_NUMBER_EMPLOYEES']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_NUMBER_EMPLOYEES']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['UF_NUMBER_EMPLOYEES']?:$notAdded?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['WORK_PROFILE']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_ACTIVITY']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['WORK_PROFILE']?:$notAdded?></div>
                            </div>
                            <div class="profile__acc-box__item" <?if(!$arUser['WORK_POSITION']){?>data-status="empty"<?}?>>
                                <div class="profile__acc-box__item-param"><?=$arHandBook['PROFILE_POSITION']['UF_VALUE']?></div>
                                <div class="profile__acc-box__item-value"><?=$arUser['WORK_POSITION']?:$notAdded?></div>
                            </div>
                        </div>
                    </div>
                    <div class="profile__acc-box__edit">
                        <a href="#" class="hoverMe edit_work_profile" data-attr="<?=$arHandBook['PROFILE_EDIT']['UF_VALUE']?>"><?=$arHandBook['PROFILE_EDIT']['UF_VALUE']?></a>
                    </div>
                </div>
                <div class="profile__acc-box__section">
                    <div class="profile__acc-box__wrap">
                        <form name="form2" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data" method="POST" class="profile__acc-box__form profile_work_form form_work_profile">
                            <input type="hidden" name="action" value="workCompany">
                            <input type="hidden" name="user" value="<?=$arUser['ID']?>">
                            <div class="profile__popup-form__wrap">
                                <div class="profile__popup-form__group __half">
                                    <label for="company"><?=$arHandBook['PROFILE_ORG']['UF_VALUE']?></label>
                                    <input name="WORK_COMPANY"  maxlength="20" id="company" type="text" placeholder="<?=$notAdded;?>" value="<?=$arUser['WORK_COMPANY']?>">
                                </div>
                                <div class="profile__popup-form__group __half">
                                    <label for="employees"><?=$arHandBook['PROFILE_NUMBER_EMPLOYEES']['UF_VALUE']?></label>
                                    <input name="UF_NUMBER_EMPLOYEES" maxlength="7" class="onlyDigit" id="employees" type="text" placeholder="<?=$notAdded;?>" value="<?=$arUser['UF_NUMBER_EMPLOYEES']?>">
                                </div>
                                <div class="profile__popup-form__group __half">
                                    <label for="acivity"><?=$arHandBook['PROFILE_ACTIVITY']['UF_VALUE']?></label>
                                    <input name="WORK_PROFILE" id="acivity" maxlength="20" type="text" placeholder="<?=$notAdded;?>" value="<?=$arUser['WORK_PROFILE']?>">
                                </div>
                                <div class="profile__popup-form__group __half">
                                    <label for="position"><?=$arHandBook['PROFILE_POSITION']['UF_VALUE']?></label>
                                    <input name="WORK_POSITION" id="position" maxlength="20" type="text" placeholder="<?=$notAdded;?>" value="<?=$arUser['WORK_POSITION']?>">
                                </div>
                            </div>
							<button type="submit" name="save" value="<?=$arHandBook['PROFILE_SAVE']['UF_VALUE']?>" data-attr="<?=$arHandBook['PROFILE_SAVE']['UF_VALUE']?>" class="profile__popup-form__button hoverMe"><?=$arHandBook['PROFILE_SAVE']['UF_VALUE']?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
<!--        <div class="profile__acc-certs">-->
<!--            <div class="profile__acc-box__title">Certificates</div>-->
<!--            <div class="profile__acc-certs__text">Click on the download button to get PDFs of your certificates</div>-->
<!--            <div class="profile__acc-certs__list">-->
<!--                <div class="profile__acc-certs__item">-->
<!--                    <a href="#" class="profile__acc-certs__item-photo">-->
<!--                        <div class="cert__thumb" data-type="orange">-->
<!--                            <div class="cert__thumb-inner">Ce</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <div class="profile__acc-certs__item-content">-->
<!--                        <div class="profile__acc-certs__item-date">10 April</div>-->
<!--                        <div class="profile__acc-certs__item-title">Human rights</div>-->
<!--                        <div class="profile__acc-certs__item-download">-->
<!--                            <a href="#" class="hoverMe downloadCert" data-type="cert_orange" data-attr="Download">Download</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div style="display:none">-->
<!--                    <div class="cert" data-type="orange" id="cert_orange">-->
<!--                        <div class="cert__wrap">-->
<!--                            <a href="https://impact-mission.org" class="cert__logo">-->
<!--                                <svg width="70" height="52" viewBox="0 0 70 52" fill="none" xmlns="http://www.w3.org/2000/svg">-->
<!--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M15.2374 0V9.74928H17.5685V2.34561H64.5815V9.74928H66.9126V0H15.2374ZM64.5815 49.6521H17.5685V42.2484H15.2374V52H66.9172V42.2484H64.5815V49.6521ZM41.4346 29.8486C41.6526 30.3659 41.759 30.9239 41.7468 31.4857C41.7573 32.0459 41.651 32.602 41.4346 33.1182C41.2265 33.5921 40.9084 34.0088 40.5072 34.3335C40.0684 34.6799 39.5658 34.9355 39.0283 35.0855C38.3907 35.2655 37.7309 35.3527 37.0687 35.3446H35.8701V38.7839H33.5277V27.8194H37.2783C37.9026 27.8112 38.5253 27.8844 39.1309 28.0372C39.6391 28.1638 40.1176 28.3897 40.5391 28.7022C40.9292 29.0019 41.2374 29.3963 41.4346 29.8486ZM37.0915 33.2879C37.6705 33.321 38.2458 33.1762 38.7412 32.8729C38.9408 32.7255 39.0999 32.5295 39.2035 32.3033C39.3071 32.0771 39.3519 31.8281 39.3337 31.5797C39.3337 30.9607 39.14 30.5296 38.7572 30.2728C38.3744 30.016 37.8229 29.8876 37.1074 29.8876H35.8154V33.2879H37.0915ZM25.6162 36.0921L28.0316 27.8286L30.7363 27.8217L31.8415 38.7862H29.4899L28.8997 31.5018L26.6576 38.7862H24.4313L22.221 31.5339L21.6286 38.7862H19.2861L20.3753 27.8217H23.1553L25.6162 36.0921ZM56.5603 29.9976C56.1382 30.1224 55.749 30.3401 55.4209 30.6351C55.0949 30.9393 54.843 31.3151 54.6849 31.7333C54.4987 32.2377 54.409 32.7729 54.4206 33.3108C54.4191 34.471 54.7434 35.3446 55.3936 35.9316C56.0438 36.5186 56.918 36.8121 58.0163 36.8121C58.3227 36.8066 58.6279 36.772 58.9278 36.7089C59.2813 36.6414 59.6261 36.5337 59.9554 36.3879L60.4112 38.3506C60.2676 38.4239 60.1081 38.4973 59.9372 38.5684C59.7399 38.6498 59.5374 38.718 59.3311 38.7725C59.0644 38.84 58.7933 38.889 58.5199 38.9192C58.1711 38.9582 57.8204 38.9766 57.4694 38.9742C56.6997 38.9831 55.934 38.8614 55.2045 38.6143C54.5546 38.3911 53.9601 38.0298 53.4613 37.5549C52.9638 37.0694 52.5808 36.4778 52.3402 35.8238C52.0632 35.0619 51.9287 34.255 51.9437 33.4438C51.9291 32.5938 52.0633 31.7478 52.3402 30.9446C52.5756 30.2587 52.9655 29.6368 53.4794 29.1277C53.9932 28.6185 54.6172 28.2359 55.3024 28.0097C56.0774 27.7472 56.8911 27.6192 57.7087 27.6314C58.2445 27.6258 58.7793 27.6788 59.3037 27.7896C59.6952 27.8684 60.0771 27.9891 60.4431 28.1496L59.9304 30.1238C59.6013 30.0096 59.2627 29.9252 58.9187 29.8715C58.6246 29.8246 58.3277 29.7985 58.03 29.7936C57.5327 29.7879 57.0374 29.8566 56.5603 29.9976ZM61.4844 29.9885V27.8217L69.9997 27.8286V29.9885H66.9167V38.7931H64.5811V29.9885H61.4844ZM41.405 38.7862L45.126 27.8217H48.1612L51.8366 38.7862H49.4532L48.6761 36.3879H44.488L43.7087 38.7862H41.405ZM46.5798 29.7156L45.126 34.322H48.029L46.5798 29.7156ZM15.2373 38.7862H17.5729V27.8217H15.2373V38.7862ZM10.2129 24.1737H12.5645L11.4593 13.2069H8.76596L6.33692 21.4773L3.87826 13.2069H1.09147L0 24.1714H2.35156L2.94401 16.9191L5.1543 24.1737H7.38738L9.62273 16.8916L10.2129 24.1737ZM17.5729 24.1738H15.2373V13.2093H17.5729V24.1738ZM21.054 21.8327C20.8887 21.7591 20.7295 21.6725 20.5778 21.5736L20.0947 23.6073C20.3101 23.7232 20.5341 23.8221 20.7647 23.9031C21.0394 24.0023 21.3203 24.0834 21.6055 24.1462C21.9192 24.2172 22.2364 24.2723 22.5557 24.3113C22.886 24.3524 23.2186 24.3731 23.5514 24.3732C24.0965 24.3741 24.639 24.2969 25.1624 24.1439C25.629 24.01 26.0654 23.7865 26.4476 23.4858C26.8083 23.1947 27.0983 22.8246 27.2953 22.4036C27.5051 21.9421 27.6087 21.4389 27.5983 20.9316C27.5993 20.6098 27.5633 20.2889 27.4912 19.9754C27.4185 19.6737 27.2919 19.3878 27.1175 19.1317C26.9182 18.8484 26.6696 18.6037 26.3838 18.4094C26.0176 18.1629 25.6198 17.9677 25.2012 17.8293L24.7979 17.6894C24.3923 17.5549 24.0596 17.4304 23.7998 17.3157C23.5847 17.2254 23.3793 17.1133 23.1869 16.981C23.0533 16.8914 22.9456 16.7681 22.8747 16.6233C22.8136 16.4728 22.7841 16.3112 22.7881 16.1486C22.7783 15.9888 22.8124 15.8294 22.8868 15.6878C22.9612 15.5462 23.0729 15.428 23.2096 15.3461C23.5843 15.1526 24.0038 15.064 24.4242 15.0893C24.8071 15.0926 25.1887 15.1341 25.5635 15.2131C25.9741 15.2975 26.3738 15.4282 26.7552 15.6029L27.2884 13.5783C26.8875 13.415 26.4736 13.2861 26.0511 13.1931C25.4445 13.0637 24.8254 13.003 24.2054 13.012C23.6909 13.0098 23.179 13.0871 22.6878 13.2413C22.2499 13.3754 21.8405 13.59 21.4801 13.8741C21.142 14.147 20.8687 14.4924 20.6803 14.8853C20.446 15.4114 20.3514 15.9896 20.4058 16.5635C20.4601 17.1374 20.6615 17.6874 20.9902 18.1595C21.3898 18.6731 22.0202 19.0751 22.8815 19.3655L23.2552 19.4916C23.5765 19.6063 23.8522 19.7072 24.0801 19.7966C24.2792 19.8689 24.466 19.9718 24.6338 20.1015C24.7672 20.2084 24.874 20.345 24.946 20.5005C25.0179 20.6827 25.0521 20.8778 25.0462 21.0737C25.0555 21.2536 25.0213 21.433 24.9467 21.5967C24.8721 21.7604 24.7593 21.9035 24.6178 22.0138C24.3277 22.2324 23.8788 22.3417 23.2712 22.3417C22.9969 22.3425 22.7232 22.3187 22.4531 22.2706C22.1976 22.2261 21.9455 22.1632 21.6989 22.0826C21.4791 22.0125 21.2638 21.929 21.054 21.8327ZM29.9867 21.5736C30.1383 21.6725 30.2976 21.7591 30.4629 21.8327C30.6726 21.929 30.888 22.0125 31.1077 22.0826C31.3551 22.1635 31.6079 22.2264 31.8643 22.2706C32.1335 22.3189 32.4065 22.3427 32.68 22.3417C33.2877 22.3417 33.7365 22.2324 34.0267 22.0138C34.1681 21.9035 34.281 21.7604 34.3556 21.5967C34.4302 21.433 34.4643 21.2536 34.4551 21.0737C34.4609 20.8778 34.4268 20.6827 34.3548 20.5005C34.2829 20.345 34.176 20.2084 34.0426 20.1015C33.8748 19.9718 33.688 19.8689 33.4889 19.7966C33.2611 19.7072 32.9854 19.6063 32.6641 19.4916L32.2904 19.3655C31.429 19.0751 30.7986 18.6731 30.3991 18.1595C30.0703 17.6874 29.8689 17.1374 29.8146 16.5635C29.7603 15.9896 29.8549 15.4114 30.0892 14.8853C30.2776 14.4918 30.5518 14.1462 30.8913 13.8741C31.2505 13.5896 31.6593 13.375 32.0967 13.2413C32.5879 13.0871 33.0997 13.0098 33.6143 13.012C34.2343 13.003 34.8534 13.0637 35.46 13.1931C35.8825 13.2861 36.2964 13.415 36.6973 13.5783L36.1527 15.5938C35.7713 15.4191 35.3715 15.2883 34.9609 15.204C34.5899 15.1256 34.2121 15.0842 33.833 15.0802C33.4126 15.0548 32.9932 15.1435 32.6185 15.337C32.4817 15.4188 32.37 15.537 32.2957 15.6786C32.2213 15.8202 32.1871 15.9796 32.1969 16.1395C32.193 16.302 32.2224 16.4636 32.2835 16.6141C32.3545 16.7589 32.4622 16.8823 32.5957 16.9718C32.7881 17.1041 32.9935 17.2163 33.2087 17.3065C33.4684 17.4212 33.8011 17.5458 34.2067 17.6803L34.61 17.8201C35.0291 17.959 35.4277 18.1542 35.7949 18.4002C36.0796 18.5952 36.3273 18.8398 36.5264 19.1225C36.7007 19.3786 36.8274 19.6645 36.9001 19.9663C36.9722 20.2798 37.0081 20.6006 37.0072 20.9224C37.0176 21.4298 36.914 21.933 36.7041 22.3944C36.5071 22.8154 36.2172 23.1855 35.8564 23.4767C35.4742 23.7773 35.0378 24.0008 34.5713 24.1347C34.0478 24.2878 33.5054 24.365 32.9603 24.364C32.6274 24.3639 32.2949 24.3433 31.9645 24.3021C31.6452 24.2632 31.3281 24.2081 31.0143 24.137C30.7291 24.0743 30.4483 23.9931 30.1735 23.894C29.9435 23.8134 29.7202 23.7145 29.5059 23.5982L29.9867 21.5736ZM39.585 24.1738H41.9206V13.2093H39.585V24.1738ZM49.8793 24.3617C49.1447 24.3715 48.4143 24.2472 47.7237 23.9948C47.092 23.7614 46.5199 23.3894 46.0489 22.9057C45.5654 22.3985 45.1963 21.7924 44.9666 21.1287C44.7006 20.3446 44.5719 19.5199 44.586 18.6914C44.5717 17.8622 44.7068 17.0372 44.9848 16.2564C45.223 15.5932 45.5972 14.9877 46.0831 14.4794C46.5493 13.9987 47.1149 13.6269 47.7397 13.3903C48.4048 13.14 49.11 13.0149 49.8201 13.0212C50.5876 13.0085 51.3506 13.1415 52.0691 13.4132C52.7004 13.6564 53.2695 14.0387 53.7348 14.5322C54.202 15.0467 54.5547 15.6556 54.7693 16.3183C55.2591 17.9181 55.2456 19.631 54.7306 21.2228C54.4972 21.888 54.1197 22.4926 53.6254 22.9929C53.1533 23.4571 52.5843 23.8096 51.9597 24.0246C51.2902 24.2547 50.5867 24.3686 49.8793 24.3617ZM49.9568 22.2981C50.3318 22.2992 50.7029 22.2211 51.046 22.0688C51.3805 21.9196 51.6744 21.6915 51.9028 21.4039C52.1588 21.0707 52.3462 20.6896 52.4542 20.2827C52.5942 19.7596 52.6602 19.2193 52.6502 18.6777C52.6502 17.4349 52.3904 16.5239 51.8709 15.9446C51.6129 15.6577 51.2956 15.4312 50.9413 15.281C50.587 15.1309 50.2043 15.0608 49.8201 15.0756C49.4474 15.0759 49.0789 15.154 48.7377 15.3049C48.396 15.4527 48.0944 15.6807 47.8582 15.9698C47.5852 16.3026 47.3828 16.6881 47.2634 17.1025C47.1136 17.6183 47.0421 18.1541 47.0515 18.6914C47.0405 19.2353 47.1175 19.7774 47.2794 20.2964C47.4085 20.7075 47.6177 21.0887 47.8946 21.4176C48.1436 21.7068 48.4555 21.9343 48.8061 22.0826C49.1716 22.2304 49.5629 22.3029 49.9568 22.2958V22.2981ZM64.3307 24.1738H66.917L66.9102 13.2093H64.6315V20.6978L60.4912 13.2093H57.7568V24.1829H60.0355V16.4605L64.3307 24.1738Z" fill="#FFFFFF"></path>-->
<!--                                </svg>-->
<!--                            </a>-->
<!--                            <div class="cert__inner">-->
<!--                                <div class="cert__title">Сертификат</div>-->
<!--                                <div class="cert__row">-->
<!--                                    <div class="cert__type">об окончании программы обучения<br> подтверждает, что</div>-->
<!--                                    <div class="cert__content">-->
<!--                                        <div class="cert__name">Иванов Иван Иванович</div>-->
<!--                                        <div class="cert__info">прошел(а) обучение по теме</div>-->
<!--                                        <div class="cert__text">-->
<!--                                            <p>«Введение в устойчивое развитие».<br> Обучение направлено на изучение основных аспектов, подходов, используемых в сфере  ESG и получение знаний и навыков для создания устойчивого бизнеса.</p>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="profile__acc-certs__item">-->
<!--                    <a href="/images/profile/certs.png" class="profile__acc-certs__item-photo" data-fancybox>-->
<!--                        <div class="cert__thumb" data-type="fiolet">-->
<!--                            <div class="cert__thumb-inner">Ce</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <div class="profile__acc-certs__item-content">-->
<!--                        <div class="profile__acc-certs__item-date">10 April</div>-->
<!--                        <div class="profile__acc-certs__item-title">Human rights</div>-->
<!--                        <div class="profile__acc-certs__item-download">-->
<!--                            <a href="#" class="hoverMe" data-attr="Download">Download</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="profile__acc-certs__item">-->
<!--                    <a href="/images/profile/certs.png" class="profile__acc-certs__item-photo" data-fancybox>-->
<!--                        <div class="cert__thumb __invert" data-type="pink">-->
<!--                            <div class="cert__thumb-inner">Ce</div>-->
<!--                        </div>-->
<!--                    </a>-->
<!--                    <div class="profile__acc-certs__item-content">-->
<!--                        <div class="profile__acc-certs__item-date">10 April</div>-->
<!--                        <div class="profile__acc-certs__item-title">Human rights</div>-->
<!--                        <div class="profile__acc-certs__item-download">-->
<!--                            <a href="#" class="hoverMe" data-attr="Download">Download</a>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
        <?$APPLICATION->ShowViewContent('personal_certificates');?>
    </div>
</div>

<div class="profile__main-right">
    <?if($arResult['CHECK_LIST']){?>
    <div class="profile__acc-checklist">
        <div class="profile__acc-top">
            <div class="profile__acc-checklist__title"><?=$arHandBook['PROFILE_PROFILE_CHECKLIST']['UF_VALUE']?></div>
            <div class="profile__acc-checklist__text"><?=$arHandBook['PROFILE_PROFILE_CHECKLIST_TEXT']['UF_VALUE']?></div>
        </div>
        <div class="profile__acc-checklist__list">
            <?foreach ($arResult['CHECK_LIST'] as $itemCheck){?>
                <?
                $class='';
                if($itemCheck['ORIGINAL'] == 'PHOTO'){
                    $class = 'check_photo';
                }if($itemCheck['ORIGINAL'] == 'BASE'){
                    $class = 'check_base';
                }if($itemCheck['ORIGINAL'] == 'WORK'){
                    $class = 'check_work';
                }
                ?>
                <a href="javascript:void(0)" class="hoverMe profile__acc-checklist__item <?=$class?>" data-code="<?=$itemCheck['CODE']?>" data-attr="<?=$itemCheck['NAME']?> →"><?=$itemCheck['NAME']?> →</a>
            <?}?>
        </div>
    </div>
    <?}?>
</div>
</div>