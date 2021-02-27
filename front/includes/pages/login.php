<?php
require_once __DIR__ . '/../../../CLASS_CRUD/membre.class.php';
$monMembre = new MEMBRE;
require_once __DIR__ . '/../../../CLASS_CRUD/user.class.php';
$monUser = new USER;

$success = false;
$e = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pseudo = $_POST['name-login'];
    $mdp = $_POST['input-login'];
    $souvMemb = $_POST['souvMemb'];

    if (isset($pseudo) && isset($mdp)) {
        $myMembreByPseudo = $monMembre->get_1MembreByPseudo($pseudo);
        $myMembreByMail = $monMembre->get_1MembreByMail($pseudo);
        if ($myMembreByPseudo) {
            if (password_verify($mdp, $myMembreByPseudo['passMemb'])) {
                if ($souvMemb == 'true') {
                    setcookie('pseudoMemb', $pseudo, time() + 60 * 60 * 24 * 30, "/");
                }
                $memb = $monMembre->get_1Membre($myMembreByPseudo['numMemb']);
                $success = true;
                session_start();
                $_SESSION['pseudoMemb'] = $memb['pseudoMemb'];
            } else {
                $e = 'Votre mot de passe n\'est pas valide.';
            }
        } elseif ($myMembreByMail) {
            if (password_verify($mdp, $myMembreByMail['passMemb'])) {
                if ($souvMemb == 'true') {
                    setcookie('pseudoMemb', $pseudo, time() + 60 * 60 * 24 * 30, "/");
                }
                $memb = $monMembre->get_1Membre($myMembreByMail['numMemb']);
                $success = true;
                session_start();
                $_SESSION['pseudoMemb'] = $memb['pseudoMemb'];
            } else {
                $e = 'Votre mot de passe n\'est pas valide.';
            }
        } else {
            $e = 'Votre identifiant n\'est pas valide.';
        }
    }
}

require_once('../commons/header.php');
?>

<!-- Put your code here my friend ;) -->

<div class="container-login">
    <canvas id="canvas3d"></canvas>
    <h1>Connexion</h1>
    <div class="login">
        <div class="content">
            <form class="form-connexion" method="post">
                <svg width="128" height="128" viewBox="0 0 128 128" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64 0C28.672 0 0 28.672 0 64C0 99.328 28.672 128 64 128C99.328 128 128 99.328 128 64C128 28.672 99.328 0 64 0ZM64 19.2C74.624 19.2 83.2 27.776 83.2 38.4C83.2 49.024 74.624 57.6 64 57.6C53.376 57.6 44.8 49.024 44.8 38.4C44.8 27.776 53.376 19.2 64 19.2ZM64 110.08C48 110.08 33.856 101.888 25.6 89.472C25.792 76.736 51.2 69.76 64 69.76C76.736 69.76 102.208 76.736 102.4 89.472C94.144 101.888 80 110.08 64 110.08Z" fill="white" />
                </svg>
                <div class="form-group">
                    <input type="input" id="name-login" name="name-login" placeholder=" " value="<?= isset($_COOKIE['pseudoMemb']) ? $_COOKIE['pseudoMemb'] : "" ?>">
                    <label>Pseudo ou mail<label>
                </div>
                <div class="form-group">
                    <input id="input-login" name="input-login" type="password" placeholder="...">
                    <div id="eye" class="eye"></div>
                    <label>Mot de passe<label>
                </div>
                <div class="souvenir">
                    <div id="checkbox" class="checkbox"><input type="hidden" name="souvMemb" id="souvMemb" value="false" /></div>
                    <span>Se souvenir de moi</span>
                </div>
                <? if($success){
                        echo '<br />';
                        echo('<span style="color: green;">Connexion réussie.</span>');
                    }elseif($e){
                        echo '<br />';
                        echo ('<span style="color: red;">'.$e.'</span>');
                    } ?>
                <button>Connexion</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    var SPLINE_EXPORTED_SCENE = {
        scenes: [{
            nodes: [0]
        }],
        nodes: [{
                children: [1, 2, 3, 4]
            },
            {
                mesh_spe: 0,
                material: 0,
                spe_interaction: 0,
                translation: [-205.32168265761072, 283.5, 165.95674582134234],
                rotation: [0, 0, 0, 1],
                scale: [1, 1, 1],
                visible: true,
                castShadow: true,
                receiveShadow: true,
                hiddenMatrix: [
                    1,
                    0,
                    0,
                    0,
                    0,
                    1,
                    0,
                    0,
                    0,
                    0,
                    1,
                    0,
                    370.32168265761067,
                    -95.50000000000003,
                    -165.95674582134313,
                    1,
                ],
                type: "mesh3d",
                uuid: "7AFEC770-AE8E-404C-9F7B-74AC3BF6E9FE",
                spe_cloner_data: {},
            },
            {
                mesh_spe: 1,
                material: 1,
                spe_interaction: 1,
                translation: [0, 0, 0],
                rotation: [
                    0.6038497833374478,
                    -0.28102825632233736,
                    0.017842478482521545,
                    0.7457011494381275,
                ],
                scale: [1.08, 1.08, 1.0800000000000003],
                visible: true,
                castShadow: true,
                receiveShadow: true,
                hiddenMatrix: [
                    1,
                    0,
                    0,
                    0,
                    0,
                    1,
                    0,
                    0,
                    0,
                    0,
                    1,
                    0,
                    -359.72425170878955,
                    -174.5978466750699,
                    -134.41390921106023,
                    1,
                ],
                type: "mesh3d",
                uuid: "65E7288B-2030-4FDC-B9D2-A54AC0539F76",
                spe_cloner_data: {},
            },
            {
                spe_interaction: 2,
                camera: 0,
                translation: [0, 6.123233995736766e-14, 1000],
                rotation: [-3.061616997868383e-17, 0, 0, 1],
                hiddenMatrix: [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                visible: true,
                uuid: "901BD866-F7D3-4A94-9E4A-749DD3461A60",
                children: [5],
            },
            {
                visible: true,
                extensions: {
                    KHR_lights_punctual: {
                        light: 0
                    }
                }
            },
            {
                spe_interaction: null,
                translation: [850000, 1300000, 1000000],
                rotation: [0, 0, 0.5, 0],
                hiddenMatrix: [1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1, 0, 0, 0, 0, 1],
                uuid: "15365FE1-E784-4B2A-BDC2-0FB4F76691E5",
                visible: true,
                extensions: {
                    KHR_lights_punctual: {
                        light: 1
                    }
                },
            },
        ],
        meshes: [],
        meshes_spe: [{
                type: "SphereGeometry",
                parameters: {
                    width: 227,
                    height: 227,
                    depth: 227,
                    widthSegments: 64,
                    heightSegments: 64,
                },
            },
            {
                type: "CubeGeometry",
                parameters: {
                    width: 200,
                    height: 200,
                    depth: 200,
                    widthSegments: 1,
                    heightSegments: 1,
                    depthSegments: 1,
                    cornerRadius: 24,
                    cornerSegments: 16,
                },
            },
        ],
        materials: [{
                material_0_Lambert: {
                    extensions: {
                        KHR_materials_common: {
                            technique: "LAMBERT",
                            values: {
                                ambient: [
                                    0.34901960784313724,
                                    0.34901960784313724,
                                    0.34901960784313724,
                                ],
                                diffuse: [
                                    0.34901960784313724,
                                    0.34901960784313724,
                                    0.34901960784313724,
                                ],
                                emission: [0, 0, 0],
                                transparent: true,
                                transparency: 1,
                            },
                        },
                    },
                    spe_options: {
                        side: 0,
                        wireframe: false,
                        flatShading: false,
                        visible: true,
                    },
                    spe_layers: [{
                            type: "color",
                            uniforms: {
                                alpha: {
                                    name: "alpha",
                                    value: 1,
                                    type: 1
                                },
                                mode: {
                                    name: "mode",
                                    value: 0,
                                    type: 1
                                },
                                color: {
                                    name: "color",
                                    value: 16744576,
                                    type: 6
                                },
                            },
                        },
                        {
                            type: "light",
                            uniforms: {
                                alpha: {
                                    name: "alpha",
                                    value: 1,
                                    type: 1
                                },
                                mode: {
                                    name: "mode",
                                    value: 3,
                                    type: 1
                                },
                            },
                        },
                    ],
                },
            },
            {
                material_1_Lambert: {
                    extensions: {
                        KHR_materials_common: {
                            technique: "LAMBERT",
                            values: {
                                ambient: [
                                    0.34901960784313724,
                                    0.34901960784313724,
                                    0.34901960784313724,
                                ],
                                diffuse: [
                                    0.34901960784313724,
                                    0.34901960784313724,
                                    0.34901960784313724,
                                ],
                                emission: [0, 0, 0],
                                transparent: true,
                                transparency: 1,
                            },
                        },
                    },
                    spe_options: {
                        side: 0,
                        wireframe: false,
                        flatShading: false,
                        visible: true,
                    },
                    spe_layers: [{
                            type: "color",
                            uniforms: {
                                alpha: {
                                    name: "alpha",
                                    value: 1,
                                    type: 1
                                },
                                mode: {
                                    name: "mode",
                                    value: 0,
                                    type: 1
                                },
                                color: {
                                    name: "color",
                                    value: 16755477,
                                    type: 6
                                },
                            },
                        },
                        {
                            type: "light",
                            uniforms: {
                                alpha: {
                                    name: "alpha",
                                    value: 1,
                                    type: 1
                                },
                                mode: {
                                    name: "mode",
                                    value: 3,
                                    type: 1
                                },
                            },
                        },
                    ],
                },
            },
        ],
        cameras: [{
            type: "Orthographic",
            orthographic: {
                xmag: 1904,
                ymag: 1018,
                zfar: 50000,
                znear: -50000
            },
            spe_options: {
                zoom: 1
            },
        }, ],
        buffers: [],
        bufferViews: [],
        accessors: [],
        extensions: {
            KHR_lights_punctual: {
                lights: [{
                        type: "hemispheric",
                        name: "Default Ambient Light",
                        color: [0.8274509803921568, 0.8274509803921568, 0.8274509803921568],
                        intensity: 0.75,
                    },
                    {
                        type: "directional",
                        name: "Default Directional Light",
                        color: [1, 1, 1],
                        intensity: 0.75,
                        shadows: {
                            castShadow: false,
                            shadowmapViewRight: 5,
                            shadowmapViewLeft: -5,
                            shadowmapViewTop: 5,
                            shadowmapViewBottom: -5,
                            shadowmapViewNear: 0.5,
                            shadowmapViewFar: 500,
                        },
                    },
                ],
            },
        },
        spline: {
            interactions: [{
                    uuid: "C027E1B2-6356-467D-9CB3-9041D9FEB250",
                    selectedState: 1,
                    states: [
                        "1E2632BB-7668-4869-96FC-6A99B4016E2A",
                        "BA38E1EE-C7D1-4027-AD24-82FE47AFAF7D",
                    ],
                    events: [{
                        type: 7,
                        ui: {
                            isCollapsed: false
                        },
                        targets: [{
                            easing: 4,
                            duration: 5000,
                            delay: 0,
                            cubicControls: [0.5, 0.05, 0.1, 0.3],
                            springParameters: {
                                mass: 1,
                                stiffness: 80,
                                damping: 10,
                                velocity: 0,
                            },
                            repeat: true,
                            cycle: true,
                            rewind: true,
                            object: "7AFEC770-AE8E-404C-9F7B-74AC3BF6E9FE",
                            state: "BA38E1EE-C7D1-4027-AD24-82FE47AFAF7D",
                        }, ],
                    }, ],
                },
                {
                    uuid: "255F28AF-3D94-47C6-8D4A-326FFDF23BD7",
                    selectedState: 1,
                    states: [
                        "6B1181C1-A62A-4515-AF02-27EC26F04BEA",
                        "26AE7A15-3128-4DE6-8FA5-DF14863BDE31",
                    ],
                    events: [{
                        type: 2,
                        ui: {
                            isCollapsed: false
                        },
                        targets: [{
                            easing: 4,
                            duration: 1000,
                            delay: 0,
                            cubicControls: [0.5, 0.05, 0.1, 0.3],
                            springParameters: {
                                mass: 1,
                                stiffness: 80,
                                damping: 10,
                                velocity: 0,
                            },
                            repeat: false,
                            cycle: false,
                            rewind: false,
                            object: "65E7288B-2030-4FDC-B9D2-A54AC0539F76",
                            state: "26AE7A15-3128-4DE6-8FA5-DF14863BDE31",
                        }, ],
                    }, ],
                },
                {
                    uuid: "36186BEF-C8C9-48E2-9976-2C01645E23D1"
                },
            ],
            interactionStates: {
                "1E2632BB-7668-4869-96FC-6A99B4016E2A": {
                    uuid: "1E2632BB-7668-4869-96FC-6A99B4016E2A",
                    name: "Base State",
                    position: [-205.32168265761072, 221.5, 165.95674582134234],
                    rotation: [0, 0, 0, "XYZ"],
                    scale: [1, 1, 1],
                    hiddenMatrix: [
                        1,
                        0,
                        0,
                        0,
                        0,
                        1,
                        0,
                        0,
                        0,
                        0,
                        1,
                        0,
                        370.32168265761067,
                        -95.50000000000003,
                        -165.95674582134313,
                        1,
                    ],
                    geometry: {
                        width: 227,
                        height: 227,
                        depth: 227
                    },
                    material: {
                        layersList: [{
                                id: 0,
                                type: "color",
                                defines: {},
                                uniforms: {
                                    f0_alpha: {
                                        value: 1
                                    },
                                    f0_mode: {
                                        value: 0
                                    },
                                    f0_color: {
                                        value: 16744576
                                    },
                                },
                            },
                            {
                                id: 1,
                                type: "light",
                                defines: {},
                                uniforms: {
                                    f1_alpha: {
                                        value: 1
                                    },
                                    f1_mode: {
                                        value: "3"
                                    }
                                },
                            },
                        ],
                    },
                },
                "BA38E1EE-C7D1-4027-AD24-82FE47AFAF7D": {
                    uuid: "BA38E1EE-C7D1-4027-AD24-82FE47AFAF7D",
                    name: "State 1",
                    position: [-205.32168265761072, 283.5, 165.95674582134234],
                    rotation: [0, 0, 0, "XYZ"],
                    scale: [1, 1, 1],
                    hiddenMatrix: [
                        1,
                        0,
                        0,
                        0,
                        0,
                        1,
                        0,
                        0,
                        0,
                        0,
                        1,
                        0,
                        370.32168265761067,
                        -95.50000000000003,
                        -165.95674582134313,
                        1,
                    ],
                    geometry: {
                        width: 227,
                        height: 227,
                        depth: 227
                    },
                    material: {
                        layersList: [{
                                id: 0,
                                type: "color",
                                defines: {},
                                uniforms: {
                                    f0_alpha: {
                                        value: 1
                                    },
                                    f0_mode: {
                                        value: 0
                                    },
                                    f0_color: {
                                        value: 16744576
                                    },
                                },
                            },
                            {
                                id: 1,
                                type: "light",
                                defines: {},
                                uniforms: {
                                    f1_alpha: {
                                        value: 1
                                    },
                                    f1_mode: {
                                        value: "3"
                                    }
                                },
                            },
                        ],
                    },
                },
                "6B1181C1-A62A-4515-AF02-27EC26F04BEA": {
                    uuid: "6B1181C1-A62A-4515-AF02-27EC26F04BEA",
                    name: "Base State",
                    position: [0, 0, 0],
                    rotation: [
                        0.487660112008446,
                        -0.40887556558729127,
                        0.41030503025395637,
                        "XYZ",
                    ],
                    scale: [0.9999999999999998, 0.9999999999999999, 1],
                    hiddenMatrix: [
                        1,
                        0,
                        0,
                        0,
                        0,
                        1,
                        0,
                        0,
                        0,
                        0,
                        1,
                        0,
                        -359.72425170878955,
                        -174.5978466750699,
                        -134.41390921106023,
                        1,
                    ],
                    geometry: {
                        width: 200,
                        height: 200,
                        depth: 200
                    },
                    material: {
                        layersList: [{
                                id: 0,
                                type: "color",
                                defines: {},
                                uniforms: {
                                    f0_alpha: {
                                        value: 1
                                    },
                                    f0_mode: {
                                        value: 0
                                    },
                                    f0_color: {
                                        value: 16755477
                                    },
                                },
                            },
                            {
                                id: 1,
                                type: "light",
                                defines: {},
                                uniforms: {
                                    f1_alpha: {
                                        value: 1
                                    },
                                    f1_mode: {
                                        value: "3"
                                    }
                                },
                            },
                        ],
                    },
                },
                "26AE7A15-3128-4DE6-8FA5-DF14863BDE31": {
                    uuid: "26AE7A15-3128-4DE6-8FA5-DF14863BDE31",
                    name: "State 1",
                    position: [0, 0, 0],
                    rotation: [
                        1.4475760816040968,
                        -0.40887556558729127,
                        0.41030503025395637,
                        "XYZ",
                    ],
                    scale: [1.08, 1.08, 1.0800000000000003],
                    hiddenMatrix: [
                        1,
                        0,
                        0,
                        0,
                        0,
                        1,
                        0,
                        0,
                        0,
                        0,
                        1,
                        0,
                        -359.72425170878955,
                        -174.5978466750699,
                        -134.41390921106023,
                        1,
                    ],
                    geometry: {
                        width: 200,
                        height: 200,
                        depth: 200
                    },
                    material: {
                        layersList: [{
                                id: 0,
                                type: "color",
                                defines: {},
                                uniforms: {
                                    f0_alpha: {
                                        value: 1
                                    },
                                    f0_mode: {
                                        value: 0
                                    },
                                    f0_color: {
                                        value: 16755477
                                    },
                                },
                            },
                            {
                                id: 1,
                                type: "light",
                                defines: {},
                                uniforms: {
                                    f1_alpha: {
                                        value: 1
                                    },
                                    f1_mode: {
                                        value: "3"
                                    }
                                },
                            },
                        ],
                    },
                },
            },
            textures: {},
            images: {},
            mainCameraIndex: 3,
            usePrimitives: true,
            bgColor: [0.09803921568627451, 0.09803921568627451, 0.09803921568627451],
            bgAlpha: 1,
            orbitDamped: false,
            orbitTarget: [0, 0, 0],
            cameraType: "Orthographic",
            cameraRotate: false,
            cameraPan: false,
            cameraZoom: false,
            viewMode: 1,
            viewWidth: 512,
            viewHeight: 512,
            quality: "low",
            useOrbitControls: false,
        },
    };
    var SPE_USES_PREVIEW_IMAGE = false;
    const runtime = new SpeRuntime(SPLINE_EXPORTED_SCENE);
    runtime.run();
</script>
<?php
require_once('../commons/footer.php');
?>