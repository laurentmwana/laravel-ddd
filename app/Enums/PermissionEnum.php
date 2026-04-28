<?php

namespace App\Enums;

use App\Helpers\Trait\Enumerable;

enum PermissionEnum: string
{
   use Enumerable;

   case AUTH_LOGIN = 'auth.login';
   case AUTH_LOGOUT = 'auth.logout';

   case USER_CREATE = 'user.create';
   case USER_VIEW = 'user.view';
   case USER_UPDATE = 'user.update';
   case USER_DELETE = 'user.delete';

      // Clients
   case CLIENT_CREATE = 'client.create';
   case CLIENT_VIEW = 'client.view';
   case CLIENT_UPDATE = 'client.update';
   case CLIENT_DELETE = 'client.delete';

      // Events
   case EVENT_CREATE = 'event.create';
   case EVENT_VIEW = 'event.view';
   case EVENT_UPDATE = 'event.update';
   case EVENT_DELETE = 'event.delete';
   case EVENT_LIST = 'event.list';

      // Guests
   case GUEST_CREATE = 'guest.create';
   case GUEST_IMPORT_CSV = 'guest.import_csv';
   case GUEST_VIEW = 'guest.view';
   case GUEST_UPDATE = 'guest.update';
   case GUEST_DELETE = 'guest.delete';

      // Invitations
   case INVITATION_SEND = 'invitation.send';
   case INVITATION_SEND_BULK = 'invitation.send_bulk';
   case INVITATION_QR_GENERATE = 'invitation.qr_generate';
   case INVITATION_UPLOAD_ZIP = 'invitation.upload_zip';
   case INVITATION_PREVIEW = 'invitation.preview';

      // Check-in
   case CHECKIN_SCAN = 'checkin.scan';
   case CHECKIN_VALIDATE = 'checkin.validate';
   case CHECKIN_HISTORY = 'checkin.history';

      // Dashboard
   case DASHBOARD_VIEW = 'dashboard.view';
   case DASHBOARD_STATS = 'dashboard.stats';
   case DASHBOARD_REALTIME = 'dashboard.realtime';

   case EXPORT_CSV = 'export.csv';

   /**
    * @return string[]
    */
   public static function forAdmin(): array
   {
      return self::values();
   }

   /**
    * @return string[]
    */
   public static function forManager(): array
   {
      return [
         self::USER_CREATE->value,
         self::USER_VIEW->value,
         self::USER_UPDATE->value,

         self::CLIENT_CREATE->value,
         self::CLIENT_VIEW->value,
         self::CLIENT_UPDATE->value,
         self::CLIENT_DELETE->value,

         self::EVENT_VIEW->value,
         self::EVENT_LIST->value,

         self::DASHBOARD_VIEW->value,
         self::DASHBOARD_STATS->value,

         self::EXPORT_CSV->value,
      ];
   }

   /**
    * @return string[]
    */
   public static function forClient(): array
   {
      return [
         self::EVENT_CREATE->value,
         self::EVENT_VIEW->value,
         self::EVENT_UPDATE->value,
         self::EVENT_DELETE->value,
         self::EVENT_LIST->value,

         self::GUEST_CREATE->value,
         self::GUEST_IMPORT_CSV->value,
         self::GUEST_VIEW->value,
         self::GUEST_UPDATE->value,
         self::GUEST_DELETE->value,

         self::INVITATION_SEND->value,
         self::INVITATION_SEND_BULK->value,
         self::INVITATION_QR_GENERATE->value,
         self::INVITATION_UPLOAD_ZIP->value,
         self::INVITATION_PREVIEW->value,

         self::DASHBOARD_VIEW->value,
         self::DASHBOARD_STATS->value,

         self::EXPORT_CSV->value,
      ];
   }

   /**
    * @return string[]
    */
   public static function forTerminal(): array
   {
      return [
         self::CHECKIN_SCAN->value,
         self::CHECKIN_VALIDATE->value,
         self::CHECKIN_HISTORY->value,
         self::EVENT_VIEW->value,
      ];
   }
}
