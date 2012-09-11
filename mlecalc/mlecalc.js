var lgmults = { "PCL": 0.68,
                "IL": 0.73,
                "SL": 0.67,
                "EL": 0.64,
                "TEX": 0.61,
                "CAL": 0.47,
                "CAR": 0.55,
                "FSL": 0.59,
                "MDW": 0.44,
                "SAL": 0.44,
                "MLB": 1.0
               };
 
var pfs = { "AbeNYP": { "R": 0.94, "H": 0.96, "D": 0.96, "HR": 0.94},
            "AkrEL": { "R": 1.01, "H": 1.02, "D": 0.96, "HR": 0.89},
            "AlbPCL": { "R": 1.17, "H": 1.09, "D": 1.01, "HR": 1.22},
            "AltEL": { "R": 0.99, "H": 1.04, "D": 1.06, "HR": 0.92},
            "ArkTEX": { "R": 1, "H": 1, "D": 1.02, "HR": 1.05},
            "AshSAL": { "R": 1.13, "H": 1.05, "D": 1.04, "HR": 1.22},
            "AubNYP": { "R": 0.98, "H": 0.98, "D": 1, "HR": 0.95},
            "AugSAL": { "R": 0.96, "H": 0.99, "D": 1.03, "HR": 0.77},
            "BakCAL": { "R": 0.98, "H": 0.99, "D": 1.01, "HR": 0.98},
            "BatNYP": { "R": 1.03, "H": 1.07, "D": 1.16, "HR": 0.88},
            "BelMDW": { "R": 1.01, "H": 1, "D": 1, "HR": 1.09},
            "BinEL": { "R": 1.05, "H": 1.05, "D": 1.05, "HR": 1.03},
            "BirSL": { "R": 0.97, "H": 0.98, "D": 1.02, "HR": 0.83},
            "BoiNWL": { "R": 1.05, "H": 1.03, "D": 0.96, "HR": 1.09},
            "BowEL": { "R": 0.94, "H": 0.96, "D": 1.02, "HR": 1.04},
            "BreFSL": { "R": 0.98, "H": 1.01, "D": 0.97, "HR": 0.95},
            "BroNYP": { "R": 0.96, "H": 0.95, "D": 1.04, "HR": 1.05},
            "BufIL": { "R": 1.01, "H": 1.01, "D": 1.03, "HR": 0.98},
            "BurMDW": { "R": 0.98, "H": 0.97, "D": 1.01, "HR": 1.02},
            "CarSL": { "R": 0.99, "H": 0.99, "D": 1.06, "HR": 0.92},
            "CedMDW": { "R": 1.01, "H": 1.02, "D": 0.95, "HR": 1.01},
            "ChaSAL": { "R": 0.95, "H": 1, "D": 1.03, "HR": 0.8},
            "ChaIL": { "R": 1.04, "H": 1.02, "D": 0.99, "HR": 1.27},
            "ChaSL": { "R": 1.07, "H": 1.05, "D": 1.04, "HR": 1.09},
            "CleFSL": { "R": 0.99, "H": 0.99, "D": 1.04, "HR": 1.06},
            "CliMDW": { "R": 1, "H": 0.99, "D": 0.99, "HR": 0.96},
            "ColPCL": { "R": 1.07, "H": 1.01, "D": 1.06, "HR": 1.01},
            "ColIL": { "R": 0.98, "H": 0.97, "D": 0.96, "HR": 1},
            "ColSAL": { "R": 0.98, "H": 0.97, "D": 0.99, "HR": 1.02},
            "ConEL": { "R": 0.92, "H": 0.97, "D": 0.97, "HR": 0.8},
            "CorTEX": { "R": 0.95, "H": 0.98, "D": 0.97, "HR": 0.98},
            "DayMDW": { "R": 1.03, "H": 0.99, "D": 0.95, "HR": 1.08},
            "DayFSL": { "R": 1.04, "H": 1.01, "D": 0.94, "HR": 1.11},
            "DelSAL": { "R": 0.96, "H": 0.97, "D": 0.94, "HR": 0.92},
            "DunFSL": { "R": 1.05, "H": 1.05, "D": 1.03, "HR": 1.18},
            "DurIL": { "R": 1.04, "H": 1, "D": 0.99, "HR": 1.12},
            "EriEL": { "R": 1.08, "H": 1.03, "D": 1, "HR": 1.1},
            "EugNWL": { "R": 0.99, "H": 0.99, "D": 0.99, "HR": 1.16},
            "EveNWL": { "R": 1.02, "H": 1.02, "D": 1.01, "HR": 1.09},
            "ForFSL": { "R": 0.96, "H": 0.99, "D": 0.98, "HR": 0.88},
            "ForMDW": { "R": 1, "H": 1.01, "D": 1.04, "HR": 1.07},
            "FreCAR": { "R": 1.03, "H": 1.01, "D": 0.93, "HR": 1.23},
            "FrePCL": { "R": 0.96, "H": 0.97, "D": 0.98, "HR": 1.04},
            "FriTEX": { "R": 1.03, "H": 1, "D": 0.96, "HR": 1.08},
            "GreMDW": { "R": 0.95, "H": 0.97, "D": 0.92, "HR": 1.1},
            "GrbSAL": { "R": 1.03, "H": 1, "D": 0.97, "HR": 1.25},
            "GrvSAL": { "R": 1.03, "H": 1.02, "D": 1, "HR": 1.05},
            "HagSAL": { "R": 0.99, "H": 0.99, "D": 1, "HR": 0.95},
            "HarEL": { "R": 1.04, "H": 1.02, "D": 0.92, "HR": 1.12},
            "HicSAL": { "R": 1, "H": 0.99, "D": 1, "HR": 1.15},
            "HigCAL": { "R": 1.1, "H": 1.03, "D": 0.96, "HR": 1.26},
            "HudNYP": { "R": 0.98, "H": 1.01, "D": 1.03, "HR": 0.96},
            "HunSL": { "R": 1, "H": 0.99, "D": 0.97, "HR": 1.07},
            "IndIL": { "R": 1.02, "H": 1.02, "D": 1.03, "HR": 1},
            "InlCAL": { "R": 0.95, "H": 1.01, "D": 1.05, "HR": 0.84},
            "IowPCL": { "R": 1.04, "H": 1.03, "D": 1.07, "HR": 1.03},
            "JacSL": { "R": 0.95, "H": 0.97, "D": 0.91, "HR": 0.98},
            "JamNYP": { "R": 1.08, "H": 1.02, "D": 0.94, "HR": 1.25},
            "JupFSL": { "R": 0.95, "H": 0.97, "D": 0.99, "HR": 0.81},
            "KanMDW": { "R": 1.08, "H": 1.09, "D": 1, "HR": 1.04},
            "KanSAL": { "R": 1.03, "H": 1.02, "D": 1.04, "HR": 0.89},
            "KinCAR": { "R": 0.99, "H": 0.97, "D": 1, "HR": 1.04},
            "LkcSAL": { "R": 1.02, "H": 1.03, "D": 1.01, "HR": 0.92},
            "LakCAL": { "R": 0.95, "H": 0.95, "D": 0.96, "HR": 0.93},
            "LakFSL": { "R": 1.02, "H": 1, "D": 0.98, "HR": 1},
            "LkwSAL": { "R": 0.94, "H": 0.99, "D": 1.08, "HR": 0.81},
            "LanCAL": { "R": 1.13, "H": 1.09, "D": 1.02, "HR": 1.25},
            "LanMDW": { "R": 1.01, "H": 0.99, "D": 1.03, "HR": 1.03},
            "LasPCL": { "R": 1.08, "H": 1.05, "D": 1.02, "HR": 1.11},
            "LexSAL": { "R": 1.01, "H": 1, "D": 0.97, "HR": 1.12},
            "LouIL": { "R": 1.03, "H": 1.02, "D": 1.03, "HR": 0.94},
            "LowNYP": { "R": 0.98, "H": 0.99, "D": 1.02, "HR": 0.93},
            "LynCAR": { "R": 1.01, "H": 1, "D": 1.1, "HR": 0.93},
            "MahNYP": { "R": 1.01, "H": 1, "D": 0.99, "HR": 1.01},
            "MemPCL": { "R": 0.94, "H": 0.96, "D": 0.98, "HR": 1.01},
            "MidTX": { "R": 1.02, "H": 1.01, "D": 1.01, "HR": 0.93},
            "MisSL": { "R": 0.97, "H": 0.99, "D": 1.01, "HR": 0.9},
            "MobSL": { "R": 1.01, "H": 1, "D": 1, "HR": 1.09},
            "ModCAL": { "R": 0.98, "H": 0.98, "D": 1.04, "HR": 0.81},
            "MonSL": { "R": 0.99, "H": 1, "D": 1.04, "HR": 0.96},
            "MyrCAR": { "R": 0.97, "H": 1.01, "D": 1.01, "HR": 0.95},
            "NasPCL": { "R": 0.95, "H": 0.96, "D": 1.02, "HR": 0.96},
            "NwbEL": { "R": 1, "H": 0.99, "D": 1.04, "HR": 1.03},
            "NwhEL": { "R": 0.98, "H": 0.96, "D": 1.03, "HR": 1.1},
            "NewPCL": { "R": 0.94, "H": 0.98, "D": 1.02, "HR": 0.91},
            "NorIL": { "R": 0.92, "H": 0.96, "D": 1, "HR": 0.83},
            "OklPCL": { "R": 0.95, "H": 0.99, "D": 1, "HR": 0.88},
            "OmaPCL": { "R": 1, "H": 0.99, "D": 0.96, "HR": 1.11},
            "OneNYP": { "R": 1.02, "H": 1, "D": 0.98, "HR": 0.78},
            "OttIL": { "R": 0.98, "H": 0.99, "D": 0.96, "HR": 0.93},
            "PalFSL": { "R": 0.94, "H": 0.97, "D": 1.02, "HR": 0.86},
            "PawIL": { "R": 1.01, "H": 1.01, "D": 0.94, "HR": 1.24},
            "PeoMDW": { "R": 0.98, "H": 1, "D": 1.05, "HR": 0.99},
            "PorEL": { "R": 1.02, "H": 0.98, "D": 0.98, "HR": 1.03},
            "PorPCL": { "R": 0.93, "H": 0.94, "D": 1, "HR": 1.02},
            "PotCAR": { "R": 0.98, "H": 0.99, "D": 0.95, "HR": 0.98},
            "QuaMDW": { "R": 0.97, "H": 0.98, "D": 1, "HR": 0.98},
            "RanCAL": { "R": 0.99, "H": 1, "D": 1.01, "HR": 0.97},
            "ReaEL": { "R": 1.04, "H": 0.99, "D": 0.95, "HR": 1.19},
            "RicPCL": { "R": 0.97, "H": 0.99, "D": 1.01, "HR": 0.87},
            "RocIL": { "R": 0.99, "H": 0.98, "D": 0.98, "HR": 0.95},
            "RomSAL": { "R": 0.98, "H": 1.01, "D": 1.06, "HR": 0.83},
            "RouTEX": { "R": 0.99, "H": 1.01, "D": 0.99, "HR": 1.01},
            "SacPCL": { "R": 0.93, "H": 0.97, "D": 0.97, "HR": 0.91},
            "SalCAR": { "R": 0.99, "H": 1.01, "D": 1.08, "HR": 0.89},
            "SalNWL": { "R": 1.06, "H": 1.01, "D": 1.05, "HR": 1.2},
            "SalPCL": { "R": 1.08, "H": 1.04, "D": 0.96, "HR": 1.02},
            "SanTEX": { "R": 0.91, "H": 0.98, "D": 1.04, "HR": 0.88},
            "SanCAL": { "R": 0.91, "H": 0.95, "D": 0.99, "HR": 0.86},
            "SarFSL": { "R": 1.01, "H": 1, "D": 1.08, "HR": 0.89},
            "SavSAL": { "R": 0.96, "H": 0.96, "D": 0.93, "HR": 1.13},
            "ScrIL": { "R": 1.01, "H": 1, "D": 1.01, "HR": 0.95},
            "SobMDW": { "R": 0.97, "H": 0.98, "D": 1.04, "HR": 0.86},
            "SpoNWL": { "R": 1.05, "H": 1, "D": 0.92, "HR": 1.27},
            "SprTEX": { "R": 1.03, "H": 1.01, "D": 1.05, "HR": 1.11},
            "St.FSL": { "R": 1.02, "H": 1, "D": 1.05, "HR": 1.02},
            "StcNYP": { "R": 0.98, "H": 0.98, "D": 0.96, "HR": 1.01},
            "StiNYP": { "R": 0.95, "H": 1, "D": 1.05, "HR": 1},
            "StoCAL": { "R": 0.99, "H": 0.97, "D": 0.98, "HR": 1.11},
            "SyrIL": { "R": 1.02, "H": 1.02, "D": 1, "HR": 1.03},
            "TacPCL": { "R": 0.91, "H": 0.94, "D": 1, "HR": 0.93},
            "TamFSL": { "R": 1, "H": 0.99, "D": 0.97, "HR": 0.97},
            "TenSL": { "R": 1.04, "H": 1.01, "D": 0.96, "HR": 1.12},
            "TolIL": { "R": 0.97, "H": 0.98, "D": 1.09, "HR": 0.93},
            "TreEL": { "R": 0.96, "H": 0.99, "D": 1.03, "HR": 0.84},
            "TriNYP": { "R": 1.14, "H": 1.11, "D": 1.07, "HR": 1.5},
            "TriNWL": { "R": 0.96, "H": 1.01, "D": 1.07, "HR": 0.73},
            "TucPCL": { "R": 1.1, "H": 1.01, "D": 1.06, "HR": 0.98},
            "TulTEX": { "R": 1, "H": 1.01, "D": 1.05, "HR": 1.07},
            "VanNWL": { "R": 0.94, "H": 0.99, "D": 1.06, "HR": 0.72},
            "VerNYP": { "R": 1.08, "H": 1.04, "D": 0.94, "HR": 1.11},
            "VerFSL": { "R": 1.07, "H": 1.02, "D": 0.97, "HR": 1.34},
            "VisCAL": { "R": 1.03, "H": 1.01, "D": 0.99, "HR": 1.21},
            "WesMDW": { "R": 1, "H": 1.01, "D": 0.98, "HR": 0.87},
            "WesSL": { "R": 1, "H": 1, "D": 1.04, "HR": 1.05},
            "WesSAL": { "R": 1, "H": 1.01, "D": 1.06, "HR": 0.88},
            "WicTEX": { "R": 1, "H": 1, "D": 0.97, "HR": 0.96},
            "WilNYP": { "R": 0.96, "H": 0.99, "D": 1.02, "HR": 1.04},
            "WilCAR": { "R": 0.96, "H": 0.97, "D": 0.96, "HR": 0.86},
            "WinCAR": { "R": 1.07, "H": 1.01, "D": 1.03, "HR": 1.1},
            "WisMDW": { "R": 1, "H": 1, "D": 1.03, "HR": 0.99},
            "YakNWL": { "R": 0.95, "H": 0.97, "D": 1.02, "HR": 0.84},
            "NwaTEX": { "R": 1, "H": 1, "D": 1, "HR": 1},
            "LehIL": { "R": 1, "H": 1, "D": 1, "HR": 1},
            "NymMLB": { "R": 0.98, "H": 0.98, "D": 0.98, "HR": 0.98},
            "ChcMLB": { "R": 1.02, "H": 1.02, "D": 1.02, "HR": 1.02},
            "ChwMLB": { "R": 1.02, "H": 1.02, "D": 1.02, "HR": 1.02},
            "LadMLB": { "R": 1.02, "H": 1.02, "D": 1.02, "HR": 1.02},
            "NyyMLB": { "R": 1, "H": 1, "D": 1, "HR": 1},
            "LaaMLB": { "R": 1.01, "H": 1.01, "D": 1.01, "HR": 1.01},
            "SdpMLB": { "R": 0.95, "H": 0.95, "D": 0.95, "HR": 0.95},
            "SfgMLB": { "R": 1, "H": 1, "D": 1, "HR": 1},
            "St.MLB": { "R": 1, "H": 1, "D": 1, "HR": 1},
            "AriMLB": { "R": 1.03, "H": 1.03, "D": 1.03, "HR": 1.03},
            "ColMLB": { "R": 1.04, "H": 1.04, "D": 1.04, "HR": 1.04},
            "AtlMLB": { "R": 0.98, "H": 0.98, "D": 0.98, "HR": 0.98},
            "PhiMLB": { "R": 1.02, "H": 1.02, "D": 1.02, "HR": 1.02},
            "BalMLB": { "R": 1.01, "H": 1.01, "D": 1.01, "HR": 1.01},
            "MinMLB": { "R": 0.98, "H": 0.98, "D": 0.98, "HR": 0.98},
            "BosMLB": { "R": 1.03, "H": 1.03, "D": 1.03, "HR": 1.03},
            "KanMLB": { "R": 1.02, "H": 1.02, "D": 1.02, "HR": 1.02},
            "CinMLB": { "R": 1.02, "H": 1.02, "D": 1.02, "HR": 1.02},
            "CleMLB": { "R": 1.01, "H": 1.01, "D": 1.01, "HR": 1.01},
            "FloMLB": { "R": 0.99, "H": 0.99, "D": 0.99, "HR": 0.99},
            "WasMLB": { "R": 0.98, "H": 0.98, "D": 0.98, "HR": 0.98},
            "MilMLB": { "R": 1.01, "H": 1.01, "D": 1.01, "HR": 1.01},
            "OakMLB": { "R": 0.96, "H": 0.96, "D": 0.96, "HR": 0.96},
            "SeaMLB": { "R": 0.98, "H": 0.98, "D": 0.98, "HR": 0.98},
            "PitMLB": { "R": 0.99, "H": 0.99, "D": 0.99, "HR": 0.99},
            "HouMLB": { "R": 0.99, "H": 0.99, "D": 0.99, "HR": 0.99},
            "TamMLB": { "R": 0.99, "H": 0.99, "D": 0.99, "HR": 0.99},
            "TexMLB": { "R": 1, "H": 1, "D": 1, "HR": 1},
            "DetMLB": { "R": 1.01, "H": 1.01, "D": 1.01, "HR": 1.01},
            "TorMLB": { "R": 1, "H": 1, "D": 1, "HR": 1},
            "neutral": { "R": 1, "H": 1, "D": 1, "HR": 1}
            };
 
var lgTeams = { "PCL": { "AlbPCL": "Albuquerque",
                         "ColPCL": "Colorado Springs",
                         "FrePCL": "Fresno",
                         "IowPCL": "Iowa",
                         "LasPCL": "Las Vegas",
                         "MemPCL": "Memphis",
                         "NasPCL": "Nashville",
                         "NewPCL": "New Orleans",
                         "OklPCL": "Oklahoma",
                         "OmaPCL": "Omaha",
                         "PorPCL": "Portland",
                         "RouPCL": "Round Rock",
                         "SacPCL": "Sacramento",
                         "SalPCL": "Salt Lake",
                         "TacPCL": "Tacoma",
                         "TucPCL": "Tucson"
                        },
                "IL": { "BufIL": "Buffalo",
                        "ChaIL": "Charlotte",
                        "ColIL": "Columbus",
                        "DurIL": "Durham",
                        "IndIL": "Indianapolis",
                        "LehIL": "Lehigh Valley",
                        "LouIL": "Louisville",
                        "NorIL": "Norfolk",
                        "PawIL": "Pawtucket",
                        "RicIL": "Richmond",
                        "RocIL": "Rochester",
                        "ScrIL": "Scranton/WB",
                        "SyrIL": "Syracuse",
                        "TolIL": "Toledo"
                       },
                "EL": { "AkrEL": "Akron",
                        "AltEL": "Altoona",
                        "BinEL": "Binghamton",
                        "BowEL": "Bowie",
                        "ConEL": "Connecticut",
                        "EriEL": "Erie",
                        "HarEL": "Harrisburg",
                        "NwbEL": "New Britain",
                        "NwhEL": "New Hampshire",
                        "PorEL": "Portland",
                        "ReaEL": "Reading",
                        "TreEL": "Trenton"
                       },
                "SL": { "BirSL": "Birmingham",
                        "CarSL": "Carolina",
                        "ChaSL": "Chattanooga",
                        "HunSL": "Huntsville",
                        "JacSL": "Jacksonville",
                        "MisSL": "Mississippi",
                        "MobSL": "Mobile",
                        "MonSL": "Montgomery",
                        "TenSL": "Tennessee",
                        "WesSL": "West Tenn"
                       },
                "TEX": { "ArkTEX": "Arkansas",
                         "CorTEX": "Corpus Christi",
                         "FriTEX": "Frisco",
                         "MidTEX": "Midland",
                         "NwaTEX": "NW Arkansas",
                         "SanTEX": "San Antonio",
                         "SprTEX": "Springfield",
                         "TulTEX": "Tulsa"
                        },
                "FSL": { "BreFSL": "Brevard County",
                         "CleFSL": "Clearwater",
                         "DayFSL": "Daytona",
                         "DunFSL": "Dunedin",
                         "ForFSL": "Fort Myers",
                         "JupFSL": "Jupiter",
                         "LakFSL": "Lakeland",
                         "PalFSL": "Palm Beach",
                         "SarFSL": "Sarasota",
                         "St.FSL": "St. Lucie",
                         "TamFSL": "Tampa",
                         "VerFSL": "Vero Beach"
                        },
                "CAR": { "FreCAR": "Frederick",
                         "KinCAR": "Kinston",
                         "LynCAR": "Lynchburg",
                         "MyrCAR": "Myrtle Beach",
                         "PotCAR": "Potomac",
                         "SalCAR": "Salem",
                         "WilCAR": "Wilmington",
                         "WinCAR": "Winston-Salem"
                        },
                "CAL": { "BakCAL": "Bakersfield",
                         "HigCAL": "High Desert",
                         "InlCAL": "Inland Empire",
                         "LakCAL": "Lake Elsinore",
                         "LanCAL": "Lancaster",
                         "ModCAL": "Modesto",
                         "RanCAL": "Rancho Cucamonga",
                         "SanCAL": "San Jose",
                         "StoCAL": "Stockton",
                         "VisCAL": "Visalia"
                        },
                "MDW": { "BelMDW": "Beloit",
                         "BurMDW": "Burlington",
                         "CedMDW": "Cedar Rapids",
                         "CliMDW": "Clinton",
                         "DayMDW": "Dayton",
                         "ForMDW": "Fort Wayne",
                         "GreMDW": "Great Lakes",
                         "KanMDW": "Kane County",
                         "LanMDW": "Lansing",
                         "PeoMDW": "Peoria",
                         "QuaMDW": "Quad Cities",
                         "SobMDW": "South Bend",
                         "WesMDW": "West Michigan",
                         "WisMDW": "Wisconsin"
                        },
                "SAL": { "AshSAL": "Asheville",
                         "AugSAL": "Augusta",
                         "ChaSAL": "Charleston",
                         "ColSAL": "Columbus",
                         "DelSAL": "Delmarva",
                         "GrbSAL": "Greensboro",
                         "GrvSAL": "Greenville",
                         "HagSAL": "Hagerstown",
                         "HicSAL": "Hickory",
                         "KanSAL": "Kannapolis",
                         "LkcSAL": "Lake County",
                         "LkwSAL": "Lakewood",
                         "LexSAL": "Lexington",
                         "RomSAL": "Rome",
                         "SavSAL": "Savannah",
                         "WesSAL": "West Virginia"
                        },
                "MLB": { "AriMLB": "Arizona",
                         "AtlMLB": "Atlanta",
                         "BalMLB": "Baltimore",
                         "BosMLB": "Boston",
                         "ChcMLB": "Chi Cubs",
                         "ChwMLB": "Chi White Sox",
                         "CinMLB": "Cincinnati",
                         "CleMLB": "Cleveland",
                         "ColMLB": "Colorado",
                         "DetMLB": "Detroit",
                         "FloMLB": "Florida",
                         "HouMLB": "Houston",
                         "KanMLB": "Kansas City",
                         "LaaMLB": "LA Angels",
                         "LadMLB": "LA Dodgers",
                         "MilMLB": "Milwaukee",
                         "MinMLB": "Minnesota",
                         "NymMLB": "NY Mets",
                         "NyyMLB": "NY Yankees",
                         "OakMLB": "Oakland",
                         "PhiMLB": "Philadelphia",
                         "PitMLB": "Pittsburgh",
                         "SdpMLB": "San Diego",
                         "SfgMLB": "San Francisco",
                         "SeaMLB": "Seattle",
                         "St.MLB": "St. Louis",
                         "TamMLB": "Tampa Bay",
                         "TexMLB": "Texas",
                         "TorMLB": "Toronto",
                         "WasMLB": "Washington"
                        }
	       };
 
function getTeamMenu(startend) {
 
    if (startend == 'start') {
        lg = document.actual.leagueStart.value;
        if (lg == "") {
            startTeam.innerHTML = "";
            return;
            }
        tmenu = '<select name="teamStart" onchange="calculate();">\n';
        }
    else {
        lg = document.actual.leagueEnd.value;
        tmenu = '<select name="teamEnd" onchange="calculate();">\n';
        }
 
    tmenu = tmenu + '<option value="neutral">Neutral</option>';
 
    for (var tm in lgTeams[lg]) {
        tmenu = tmenu + '<option value="' + tm + '">' + lgTeams[lg][tm] + '</option>';
        };
 
    tmenu = tmenu + '</select>\n';
 
    if (startend == 'start')
        startTeam.innerHTML = tmenu;
    else
        endTeam.innerHTML = tmenu;
 
    };
 
function parkAdjustBat(line, pfs, tofrom) {
 
    var pkMults = {};
 
    if (tofrom == "from") {
        for (comp in pfs) {
            pkMults[comp] = 1/pfs[comp];
            };
        }
    else
        pkMults = pfs;
 
    var pkLine = {};
 
    //for (var stat in ['AB', 'W', 'K', 'SB', 'CS', 'HP'])
        //pkLine[stat] = line[stat];
 
    var nstats = ['AB', 'W', 'K', 'SB', 'CS', 'HP'];
    for (var i = 0; i < nstats.length; i++)
        pkLine[nstats[i]] = line[nstats[i]];
 
    var rstats = ['R', 'RBI']
    for (var i = 0; i < rstats.length; i++)
        pkLine[rstats[i]] = line[rstats[i]]*pkMults['R'];
 
    var dstats = ['D', 'T']
    for (var i = 0; i < dstats.length; i++)
        pkLine[dstats[i]] = line[dstats[i]]*pkMults['D'];
 
    var hstats = ['H', 'HR']
    for (var i = 0; i < hstats.length; i++)
        pkLine[hstats[i]] = line[hstats[i]]*pkMults['H'];
 
    return pkLine;
 
    };
    
 
function lgAdjustBat(line, mult) {
 
    var pa = line["AB"] + line["W"] + line["HP"];
 
    var adjLine = { "R": line["R"]*(Math.pow(mult, .75)),
                    "RBI": line["RBI"]*(Math.pow(mult, .75)),
                    "T": line["T"]*(Math.pow(mult, .75)),
                    "HR": line["HR"]*(Math.pow(mult, .75)),
                    "W": line["W"]*(Math.pow(mult, .75)),
                    "HP": line["HP"]*(Math.pow(mult, .75)),
                    "H": line["H"]*(Math.pow(mult, .4)),
                    "D": line["D"]*(Math.pow(mult, .5)),
    		    "SB": line["SB"]*(Math.pow(mult, .5)),
                    "CS": line["CS"]/(Math.pow(mult, .25)),
                    "K": line["K"]/(Math.pow(mult, .2))
                   };
 
    adjLine["AB"] = pa - adjLine["W"] - adjLine["HP"];
    return adjLine;    
    };
 
function addRatesBat(line) {
    line["AVG"] = line["H"]/line["AB"];
    line["OBP"] = (line["H"] + line["W"] + line["HP"])/(line["AB"] + line["W"] + line["HP"]);
    line["SLG"] = (line["H"] + line["D"] + 2*line["T"] + 3*line["HR"])/line["AB"];
    return line;
    };
 
function calculate() {
    var batInputs = { "AB": Number(document.actual.ab.value),
                      "R": document.actual.r.value,
                      "H": document.actual.h.value,
                      "D": document.actual.d.value,
                      "T": document.actual.t.value,
                      "HR": document.actual.hr.value,
                      "RBI": document.actual.rbi.value,
                      "W": Number(document.actual.w.value),
                      "K": document.actual.k.value,
                      "SB": document.actual.sb.value,
                      "CS": document.actual.cs.value,
                      "HP": Number(document.actual.hp.value)
                     };
 
 
    var lg = document.actual.leagueStart.value;
    var lg2 = document.actual.leagueEnd.value;
 
    var tmStart = document.actual.teamStart.value;
  
    try {
        var tmEnd = document.actual.teamEnd.value;
        }
    catch (ex) {
        var tmEnd = "neutral";
        }
 
    adjLine = parkAdjustBat(batInputs, pfs[tmStart], "from");
 
    adjLine = lgAdjustBat(adjLine, lgmults[lg]);
 
    adjLine = lgAdjustBat(adjLine, 1/lgmults[lg2]);
 
    adjLine = parkAdjustBat(adjLine, pfs[tmEnd], "to");
 
    adjLine = addRatesBat(adjLine);
 
    if (isFinite(adjLine["AVG"]) && (lg != "")) {
        document.getElementById("eab").value = adjLine["AB"].toFixed(0);
        document.getElementById("er").value = adjLine["R"].toFixed(0);
        document.getElementById("eh").value = adjLine["H"].toFixed(0);
        document.getElementById("ed").value = adjLine["D"].toFixed(0);
        document.getElementById("et").value = adjLine["T"].toFixed(0);
        document.getElementById("ehr").value = adjLine["HR"].toFixed(0);
        document.getElementById("erbi").value = adjLine["RBI"].toFixed(0);
        document.getElementById("ew").value = adjLine["W"].toFixed(0);
        document.getElementById("ek").value = adjLine["K"].toFixed(0);
        document.getElementById("eba").value = adjLine["AVG"].toFixed(3);
        document.getElementById("eobp").value = adjLine["OBP"].toFixed(3);
        document.getElementById("eslg").value = adjLine["SLG"].toFixed(3);
        document.getElementById("esb").value = adjLine["SB"].toFixed(0);
        document.getElementById("ecs").value = adjLine["CS"].toFixed(0);
        document.getElementById("ehp").value = adjLine["HP"].toFixed(0);
    }
    // Otherwise, the user's input was probably invalid, so display nothing.
    else {
        document.getElementById("eab").value = "";
        document.getElementById("er").value = "";
        document.getElementById("eh").value = "";
        document.getElementById("ed").value = "";
        document.getElementById("et").value = "";
        document.getElementById("ehr").value = "";
        document.getElementById("erbi").value = "";
        document.getElementById("ew").value = "";
        document.getElementById("ek").value = "";
        document.getElementById("eba").value = "";
        document.getElementById("eobp").value = "";
        document.getElementById("eslg").value = "";
        document.getElementById("esb").value = "";
        document.getElementById("ecs").value = "";
        document.getElementById("ehp").value = "";
    }
}