
-- ----------------------------
-- Table structure for Manager
-- ----------------------------
DROP TABLE IF EXISTS `User`;
CREATE TABLE `User`  (
  `UserId` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Password` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Email` varchar(812) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Scope` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `IsActive` int(11) NULL DEFAULT 1,
  `CreatedDate` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `RememberToken` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ReferralCode` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`UserId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for Permission
-- ----------------------------
DROP TABLE IF EXISTS `Permission`;
CREATE TABLE `Permission`  (
  `PermissionId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `PermissionCode` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ParentPermissionCode` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `TitleVi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Page',
  `Priority` smallint(5) UNSIGNED NULL DEFAULT 1,
  `IsActive` tinyint(1) NULL DEFAULT 1,
  `CreatedDate` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NULL DEFAULT NULL,
  `UpdatedDate` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NULL DEFAULT NULL,
  `Mode` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT 'Single',
  PRIMARY KEY (`PermissionId`) USING BTREE,
  UNIQUE INDEX `UC_Permission_PermissionCode_ParentPermissionCode`(`PermissionCode`, `ParentPermissionCode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;


-- ----------------------------
-- Table structure for Role
-- ----------------------------
DROP TABLE IF EXISTS `Role`;
CREATE TABLE `Role`  (
  `RoleId` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `RoleName` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Priority` smallint(5) UNSIGNED NULL DEFAULT 1,
  `IsActive` tinyint(1) NULL DEFAULT 1,
  `CreatedDate` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NULL DEFAULT NULL,
  `UpdatedDate` datetime NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`RoleId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for RolePermission
-- ----------------------------
DROP TABLE IF EXISTS `RolePermission`;
CREATE TABLE `RolePermission`  (
  `RoleId` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `PermissionId` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`RoleId`, `PermissionId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for UserRole
-- ----------------------------
DROP TABLE IF EXISTS `UserRole`;
CREATE TABLE `UserRole`  (
  `UserId` int(10) UNSIGNED NOT NULL,
  `RoleId` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `CreatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `CreatedBy` int(11) NULL DEFAULT NULL,
  `UpdatedDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`UserId`, `RoleId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

