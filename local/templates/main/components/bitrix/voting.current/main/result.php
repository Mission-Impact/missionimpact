<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
?>
<?$APPLICATION->IncludeComponent(
    "bitrix:voting.result",
    "main",
    Array(
        "VOTE_ID" => $arResult["VOTE_ID"],
        "CACHE_TIME" => $arParams["CACHE_TIME"],
        "PERMISSION" => $arParams["PERMISSION"],
        "ADDITIONAL_CACHE_ID" => $arResult["ADDITIONAL_CACHE_ID"],
        "CACHE_TYPE" => $arParams["CACHE_TYPE"],
        "VOTE_ALL_RESULTS" => $arParams["VOTE_ALL_RESULTS"],
        "CAN_VOTE" => $arParams["CAN_VOTE"]),
    ($this->__component->__parent ? $this->__component->__parent : $component),
    array("HIDE_ICONS" => "Y")
);?>