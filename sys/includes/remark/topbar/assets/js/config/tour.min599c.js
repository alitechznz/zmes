/*!
 * Remark (http://getbootstrapadmin.com/remark)
 * Copyright 2017 amazingsurge
 * Licensed under the Themeforest Standard Licenses
 */

!function(global,factory){if("function"==typeof define&&define.amd)define("/config/tour",["Config"],factory);else if("undefined"!=typeof exports)factory(require("Config"));else{var mod={exports:{}};factory(global.Config),global.configTour=mod.exports}}(this,function(_Config){"use strict";babelHelpers.interopRequireWildcard(_Config).set("tour",{steps:[{element:"#toggleFullscreen",intro:"Full Screen <p class='content'>Click this button you can view the admin template in full screen</p>"},{element:"#toggleChat",position:"left",intro:"Quick Conversations <p class='content'>This is a sidebar dialog box for user conversations list, you can even create a quick conversation with other users</p>"}],skipLabel:"<i class='wb-close'></i>",doneLabel:"<i class='wb-close'></i>",nextLabel:"Next <i class='wb-chevron-right-mini'></i>",prevLabel:"<i class='wb-chevron-left-mini'></i>Prev",showBullets:!1})});