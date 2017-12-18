<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
CModule::IncludeModule("iblock");
//print_r($arParams);
$arFilter = 	[
					"IBLOCK_TYPE" => $arParams['IBLOCK_TYPE'],
					"IBLOCK_ID" => $arParams['IBLOCK_ID'],
					"ACTIVE" => "Y",
				];
$arOrder =  [
				"SORT" => "ASC",
			];	

$res = CIBlockElement::GetList($arOrder,$arFilter, false, array(),Array("ID","NAME","PREVIEW_PICTURE","DETAIL_PICTURE"));

//print_r($res);


while($result = $res->Fetch()){
	if($result['PREVIEW_PICTURE'] == ''){
		$img_path =  CFile::GetPath($result["DETAIL_PICTURE"]);
	}else{
		$img_path = CFile::GetPath($result['PREVIEW_PICTURE']);
	}

	$arResult[] =	[
						'IMG' => $img_path,
						'NAME' => $result['NAME'],
					];
}

$this->includeComponentTemplate();

