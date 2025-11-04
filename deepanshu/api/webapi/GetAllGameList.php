<?php
header("Access-Control-Allow-Origin: http://diuvin.shop");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
date_default_timezone_set('Asia/Kolkata');
$serviceNowTimeFormatted = date('Y-m-d H:i:s');

$jsonData = '{
    "data": {
        "popular": {
            "platformList": [
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "800",
                    "gameNameEn": "Aviator",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/800_20250210113151122.png",
                    "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/800_20250210113151154.png",
                    "winOdds": 97.90
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "100",
                    "gameNameEn": "Mines",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/100.png",
                    "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/100_20250210102610370.png",
                    "winOdds": 96.26
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "105",
                    "gameNameEn": "Goal",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/105_20250210113618898.png",
                    "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/105_20250210113618945.png",
                    "winOdds": 97.64
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "102",
                    "gameNameEn": "Dice",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/102_20250210111705541.png",
                    "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/102_20250210102559317.png",
                    "winOdds": 96.13
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "103",
                    "gameNameEn": "Plinko",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/103_20250210111953841.png",
                    "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/103_20250210102957755.png",
                    "winOdds": 97.94
                },
                {
                    "vendorId": "23",
                    "vendorCode": "TB_Chess",
                    "gameCode": "101",
                    "gameNameEn": "Hilo",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/101_20250210111652965.png",
                    "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/101_20250210102547898.png",
                    "winOdds": 97.19
                }
            ],
            "clicksTopList": [
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "51",
                    "gameNameEn": "Money Coming",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/51.png",
                    "imgUrl2": "",
                    "winOdds": 96.65
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "109",
                    "gameNameEn": "Fortune Gems",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/109.png",
                    "imgUrl2": "",
                    "winOdds": 97.02
                },
                {
                    "vendorId": "17",
                    "vendorCode": "EVO_Electronic",
                    "gameCode": "grandwheel000000",
                    "gameNameEn": "Grand Wheel",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/EVO_Electronic/grandwheel000000.png",
                    "imgUrl2": "",
                    "winOdds": 97.50
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "27",
                    "gameNameEn": "SevenSevenSeven",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/27.png",
                    "imgUrl2": "",
                    "winOdds": 97.91
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "47",
                    "gameNameEn": "Charge Buffalo",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/47.png",
                    "imgUrl2": "",
                    "winOdds": 96.43
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "1",
                    "gameNameEn": "Royal Fishing",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/1.png",
                    "imgUrl2": "",
                    "winOdds": 97.29
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "35",
                    "gameNameEn": "Crazy777",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/35.png",
                    "imgUrl2": "",
                    "winOdds": 97.78
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "49",
                    "gameNameEn": "Super Ace",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/49.png",
                    "imgUrl2": "",
                    "winOdds": 97.28
                },
                {
                    "vendorId": "17",
                    "vendorCode": "EVO_Electronic",
                    "gameCode": "777strike0000000",
                    "gameNameEn": "777 Strike",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/EVO_Electronic/777strike0000000.png",
                    "imgUrl2": "",
                    "winOdds": 97.12
                },
                {
                    "vendorId": "6",
                    "vendorCode": "JDB",
                    "gameCode": "14027",
                    "gameNameEn": "Lucky Seven",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JDB/14027.png",
                    "imgUrl2": "",
                    "winOdds": 96.10
                },
                {
                    "vendorId": "19",
                    "vendorCode": "Card365",
                    "gameCode": "707",
                    "gameNameEn": "3 Patti Classic",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/Card365/707_20250210142254071.png",
                    "imgUrl2": "",
                    "winOdds": 96.17
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "82",
                    "gameNameEn": "Happy Fishing",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/82.png",
                    "imgUrl2": "",
                    "winOdds": 96.90
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "32",
                    "gameNameEn": "Jack Pot Fishing",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/32.png",
                    "imgUrl2": "",
                    "winOdds": 96.34
                },
                {
                    "vendorId": "4",
                    "vendorCode": "MG",
                    "gameCode": "SMG_wildfireWins",
                    "gameNameEn": "Wildfire Wins",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/MG/SMG_wildfireWins.png",
                    "imgUrl2": "",
                    "winOdds": 96.38
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "74",
                    "gameNameEn": "Mega Fishing",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/74.png",
                    "imgUrl2": "",
                    "winOdds": 97.79
                },
                {
                    "vendorId": "18",
                    "vendorCode": "JILI",
                    "gameCode": "45",
                    "gameNameEn": "Golden Bank",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/45.png",
                    "imgUrl2": "",
                    "winOdds": 97.18
                },
                {
                    "vendorId": "19",
                    "vendorCode": "Card365",
                    "gameCode": "710",
                    "gameNameEn": "Rummy",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/Card365/710_20250210142312293.png",
                    "imgUrl2": "",
                    "winOdds": 96.95
                },
                {
                    "vendorId": "19",
                    "vendorCode": "Card365",
                    "gameCode": "563",
                    "gameNameEn": "Three Pictures",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/Card365/563_20250210142918946.png",
                    "imgUrl2": "",
                    "winOdds": 97.63
                }
            ],
            "clicksVideoTopList": [
                {
                    "vendorId": "38",
                    "vendorCode": "MG_Video",
                    "gameCode": "SMG_titaniumLiveGamesAutoRoulette",
                    "gameNameEn": "Auto Roulette ",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/MG_Video/SMG_titaniumLiveGamesAutoRoulette.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "38",
                    "vendorCode": "MG_Video",
                    "gameCode": "SMG_titaniumLiveGames_Roulette",
                    "gameNameEn": "Roulette ",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/MG_Video/SMG_titaniumLiveGames_Roulette.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "38",
                    "vendorCode": "MG_Video",
                    "gameCode": "SMG_titaniumLiveGames_Sicbo",
                    "gameNameEn": "Sicbo",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/MG_Video/SMG_titaniumLiveGames_Sicbo.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "38",
                    "vendorCode": "MG_Video",
                    "gameCode": "SMG_titaniumLiveGames_Baccarat",
                    "gameNameEn": "Bonus Baccarat",
                    "imgUrl": "https://mishbahop.github.io/91club/gamelogo/MG_Video/SMG_titaniumLiveGames_Baccarat.png",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "CBAC",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "SBAC",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "NN",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "BJ",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                },
                {
                    "vendorId": "10",
                    "vendorCode": "AG_Video",
                    "gameCode": "ZJH",
                    "gameNameEn": null,
                    "imgUrl": "",
                    "imgUrl2": "",
                    "winOdds": 0.0
                }
            ]
        },
        "sport": [
            {
                "slotsTypeID": 25,
                "slotsName": "Wickets9",
                "vendorId": 25,
                "vendorCode": "Wickets9",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_20240102165536rgfg.png"
            }
        ],
        "video": [
            {
                "slotsTypeID": 16,
                "slotsName": "EVO_Video",
                "vendorId": 16,
                "vendorCode": "EVO_Video",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_20240102165020x66i.png"
            },
            {
                "slotsTypeID": 10,
                "slotsName": "AG_Video",
                "vendorId": 10,
                "vendorCode": "AG_Video",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_202401021635413lly.png"
            },
            {
                "slotsTypeID": 38,
                "slotsName": "MG_Video",
                "vendorId": 38,
                "vendorCode": "MG_Video",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_202405081133481rmp.png"
            }
        ],
        "slot": [
            {
                "slotsTypeID": 18,
                "slotsName": "JILI",
                "vendorId": 18,
                "vendorCode": "JILI",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_20250210101450ooy8.png"
            },
            {
                "slotsTypeID": 6,
                "slotsName": "JDB",
                "vendorId": 6,
                "vendorCode": "JDB",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_20250210101414n2wm.png"
            },
            {
                "slotsTypeID": 4,
                "slotsName": "MG",
                "vendorId": 4,
                "vendorCode": "MG",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_202401021653336o2h.png"
            },
            {
                "slotsTypeID": 17,
                "slotsName": "EVO_Electronic",
                "vendorId": 17,
                "vendorCode": "EVO_Electronic",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_20250210101616beik.png"
            },
            {
                "slotsTypeID": 5,
                "slotsName": "PG",
                "vendorId": 5,
                "vendorCode": "PG",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_20250210101541uomm.png"
            },
            {
                "slotsTypeID": 41,
                "slotsName": "G9",
                "vendorId": 41,
                "vendorCode": "G9",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_20250210101325vpri.png"
            },
            {
                "slotsTypeID": 37,
                "slotsName": "MG_Fish",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_202502101015194ux1.png"
            }
        ],
        "chess": [
            {
                "slotsTypeID": 19,
                "slotsName": "Card365",
                "vendorId": 19,
                "vendorCode": "Card365",
                "state": 1,
                "vendorImg": "https://mishbahop.github.io/91club/vendorlogo/vendorlogo_20240102164947dvuc.png"
            }
        ],
        "fish": [
            {
                "gameID": "1",
                "gameNameEn": "Royal Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/1.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "119",
                "gameNameEn": "All-star Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/119.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "20",
                "gameNameEn": "Bombing Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/20.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "212",
                "gameNameEn": "Dinosaur Tycoon II",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/212.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "32",
                "gameNameEn": "Jack Pot Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/32.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "42",
                "gameNameEn": "Dinosaur Tycoon",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/42.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "60",
                "gameNameEn": "Dragon Fortune",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/60.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "71",
                "gameNameEn": "Boom Legend",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/71.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "74",
                "gameNameEn": "Mega Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/74.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "82",
                "gameNameEn": "Happy Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/82.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDFuWaFishing",
                "gameNameEn": "WD FuWa Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/MG_Fish/SFG_WDFuWaFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDGoldBlastFishing",
                "gameNameEn": "WD Gold Blast Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/MG_Fish/SFG_WDGoldBlastFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDGoldenFortuneFishing",
                "gameNameEn": "WD Golden Fortune Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/MG_Fish/SFG_WDGoldenFortuneFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDGoldenFuwaFishing",
                "gameNameEn": "WD Golden Fuwa Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/MG_Fish/SFG_WDGoldenFuwaFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDGoldenTyrantFishing",
                "gameNameEn": "WD Golden Tyrant Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/MG_Fish/SFG_WDGoldenTyrantFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "SFG_WDMerryIslandFishing",
                "gameNameEn": "WD Merry Island Fishing",
                "img": "https://mishbahop.github.io/91club/gamelogo/MG_Fish/SFG_WDMerryIslandFishing.png",
                "vendorId": 37,
                "vendorCode": "MG_Fish",
                "imgUrl2": "",
                "customGameType": 0
            }
        ],
        "flash": [
            {
                "gameID": "800",
                "gameNameEn": "Aviator",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/800_20250210113151122.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/800_20250210113151154.png",
                "customGameType": 0
            },
            {
                "gameID": "810",
                "gameNameEn": "Cricket",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/810_20250210113250708.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/810_20250210102343302.png",
                "customGameType": 0
            },
            {
                "gameID": "100",
                "gameNameEn": "Mines",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/100.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/100_20250210102610370.png",
                "customGameType": 0
            },
            {
                "gameID": "811",
                "gameNameEn": "Mines Pro",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/811_20250210111531137.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/811_20250210102457796.png",
                "customGameType": 0
            },
            {
                "gameID": "110",
                "gameNameEn": "Limbo",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/110_20250210111637635.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/110_20250210102531478.png",
                "customGameType": 0
            },
            {
                "gameID": "903",
                "gameNameEn": "DragonTiger",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/903_20250210111422071.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/903_20250210111422103.png",
                "customGameType": 0
            },
            {
                "gameID": "105",
                "gameNameEn": "Goal",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/105_20250210113618898.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/105_20250210113618945.png",
                "customGameType": 0
            },
            {
                "gameID": "102",
                "gameNameEn": "Dice",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/102_20250210111705541.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/102_20250210102559317.png",
                "customGameType": 0
            },
            {
                "gameID": "801",
                "gameNameEn": "Aviator-1Min",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/801_20250210111620851.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/801_20250210102517568.png",
                "customGameType": 0
            },
            {
                "gameID": "103",
                "gameNameEn": "Plinko",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/103_20250210111953841.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/103_20250210102957755.png",
                "customGameType": 0
            },
            {
                "gameID": "101",
                "gameNameEn": "Hilo",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/101_20250210111652965.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/101_20250210102547898.png",
                "customGameType": 0
            },
            {
                "gameID": "500",
                "gameNameEn": "Bomb Wave",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/500_20250210111515519.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/500_20250210111515551.png",
                "customGameType": 0
            },
            {
                "gameID": "501",
                "gameNameEn": "Treasure Wave",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/501_20250210111454539.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/501_20250210111454570.png",
                "customGameType": 0
            },
            {
                "gameID": "107",
                "gameNameEn": "Hotline",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/107.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/107_20250210102621503.png",
                "customGameType": 0
            },
            {
                "gameID": "111",
                "gameNameEn": "Cryptos",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/111_20250210111910188.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/111_20250210102818079.png",
                "customGameType": 0
            },
            {
                "gameID": "108",
                "gameNameEn": "Space Dice",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/108_20250210111925043.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/108_20250210102832504.png",
                "customGameType": 0
            },
            {
                "gameID": "502",
                "gameNameEn": "Goal Wave",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/502_20250210111723255.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/502_20250210102634845.png",
                "customGameType": 0
            },
            {
                "gameID": "104",
                "gameNameEn": "Mini Roulette",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/104_20250210111939890.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/104_20250210102944301.png",
                "customGameType": 0
            },
            {
                "gameID": "114",
                "gameNameEn": "HorseRacing",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/114_20250210111823763.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/114_20250210102737194.png",
                "customGameType": 0
            },
            {
                "gameID": "900",
                "gameNameEn": "Keno80",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/900_20250210112011401.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/900_20250210103014351.png",
                "customGameType": 0
            },
            {
                "gameID": "106",
                "gameNameEn": "Keno",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/106.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/106_20250210102847401.png",
                "customGameType": 0
            },
            {
                "gameID": "113",
                "gameNameEn": "Pharaoh",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/113_20250210111843895.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/113_20250210102751084.png",
                "customGameType": 0
            },
            {
                "gameID": "112",
                "gameNameEn": "Triple",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/112_20250210111856804.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/112_20250210102805495.png",
                "customGameType": 0
            },
            {
                "gameID": "118",
                "gameNameEn": "DrawPoker",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/118_20250210111753896.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/118_20250210102701572.png",
                "customGameType": 0
            },
            {
                "gameID": "119",
                "gameNameEn": "Treasure",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/119_20250210111739604.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/119_20250210102647806.png",
                "customGameType": 0
            },
            {
                "gameID": "115",
                "gameNameEn": "TeenPatti",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/115_20250210111808132.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/115_20250210102712701.png",
                "customGameType": 0
            },
            {
                "gameID": "109",
                "gameNameEn": "Coinflip",
                "img": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/109_20250210112028682.png",
                "vendorId": 23,
                "vendorCode": "TB_Chess",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/TB_Chess/109_20250210103027904.png",
                "customGameType": 0
            },
            {
                "gameID": "224",
                "gameNameEn": "Go Rush",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/224_20250213130849608.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "229",
                "gameNameEn": "Mines",
                "img": "https://mishbahop.github.io/91club/gamelogo/JILI/229_20250213130902179.png",
                "vendorId": 18,
                "vendorCode": "JILI",
                "imgUrl2": "",
                "customGameType": 0
            },
            {
                "gameID": "aviator",
                "gameNameEn": "Aviator",
                "img": "https://mishbahop.github.io/91club/gamelogo/SPRIBE/aviator_20250210120506414.png",
                "vendorId": 20,
                "vendorCode": "SPRIBE",
                "imgUrl2": "https://mishbahop.github.io/91club/gamelogo/SPRIBE/aviator_20250210120506461.png",
                "customGameType": 0
            }
        ],
        "lottery": [
            {
                "id": 1,
                "categoryCode": "Win Go",
                "categoryName": "WinGo彩票",
                "state": 1,
                "sort": 10,
                "categoryImg": "https://mishbahop.github.io/91club/lotterycategory/lotterycategory_202502101011154e3a.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 2,
                "categoryCode": "K3",
                "categoryName": "K3彩票",
                "state": 1,
                "sort": 8,
                "categoryImg": "https://mishbahop.github.io/91club/lotterycategory/lotterycategory_20250210101053ntrf.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 3,
                "categoryCode": "5D",
                "categoryName": "5D彩票",
                "state": 1,
                "sort": 1,
                "categoryImg": "https://mishbahop.github.io/91club/lotterycategory/lotterycategory_20250210101042iwui.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            },
            {
                "id": 4,
                "categoryCode": "Trx Win Go",
                "categoryName": "TrxWinGo彩票",
                "state": 1,
                "sort": 0,
                "categoryImg": "https://mishbahop.github.io/91club/lotterycategory/lotterycategory_20250210101104jtse.png",
                "wingoAmount": null,
                "k3Amount": null,
                "fiveDAmount": null,
                "trxWingoAmount": null
            }
        ],
        "awardRecordList": [
            {
                "orderId": 9718293,
                "userId": 12605270,
                "userPhoto": "1",
                "userName": "918853451860",
                "gameName": "Money Coming",
                "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/51.png",
                "imgUrl2": "",
                "multiple": 20.00,
                "bonusAmount": 100.00,
                "multipleName": "20-29",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718292,
                "userId": 1276302,
                "userPhoto": "1",
                "userName": "919401169794",
                "gameName": "Money Coming",
                "imgUrl": "https://ossimg.91admin123admin./91club/gamelogo/JILI/51.png",
                "imgUrl2": "",
                "multiple": 50.00,
                "bonusAmount": 300.00,
                "multipleName": "40-59",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718291,
                "userId": 169929,
                "userPhoto": "4",
                "userName": "919813473272",
                "gameName": "Fortune Gems",
                "imgUrl": "https://ossimg.91admin123admin./91club/gamelogo/JILI/109.png",
                "imgUrl2": "",
                "multiple": 10.67,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718290,
                "userId": 5160891,
                "userPhoto": "5",
                "userName": "917503916092",
                "gameName": "Money Coming",
                "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/51.png",
                "imgUrl2": "",
                "multiple": 41.00,
                "bonusAmount": 300.00,
                "multipleName": "40-59",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718289,
                "userId": 3864680,
                "userPhoto": "1",
                "userName": "916351724933",
                "gameName": "Money Coming",
                "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/51.png",
                "imgUrl2": "",
                "multiple": 30.00,
                "bonusAmount": 200.00,
                "multipleName": "30-39",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718288,
                "userId": 12985588,
                "userPhoto": "1",
                "userName": "918088072814",
                "gameName": "Money Coming",
                "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/51.png",
                "imgUrl2": "",
                "multiple": 10.00,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718287,
                "userId": 9552754,
                "userPhoto": "7",
                "userName": "919429848853",
                "gameName": "Crazy777",
                "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/35.png",
                "imgUrl2": "",
                "multiple": 36.67,
                "bonusAmount": 200.00,
                "multipleName": "30-39",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718286,
                "userId": 9841016,
                "userPhoto": "6",
                "userName": "918690536005",
                "gameName": "Royal Fishing",
                "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/1.png",
                "imgUrl2": "",
                "multiple": 11.67,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718285,
                "userId": 13598097,
                "userPhoto": "1",
                "userName": "918953816512",
                "gameName": "Fortune Gems",
                "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/109.png",
                "imgUrl2": "",
                "multiple": 26.67,
                "bonusAmount": 100.00,
                "multipleName": "20-29",
                "createTime": "2025-02-18 13:39:01"
            },
            {
                "orderId": 9718284,
                "userId": 12605270,
                "userPhoto": "1",
                "userName": "918853451860",
                "gameName": "Money Coming",
                "imgUrl": "https://mishbahop.github.io/91club/gamelogo/JILI/51.png",
                "imgUrl2": "",
                "multiple": 11.00,
                "bonusAmount": 50.00,
                "multipleName": "10-19",
                "createTime": "2025-02-18 13:39:01"
            }
        ]
    },
    "code": 0,
    "msg": "Succeed",
    "msgCode": 0,
    "serviceNowTime": "' . $serviceNowTimeFormatted . '"
}';

$data = json_decode($jsonData, true);

$response = json_encode($data, JSON_PRETTY_PRINT);

header('Content-Type: application/json');
echo $response;

?>