<?php
use Bitrix\Main\Diag\Debug;
// Регистрируем обработчик события 'OnBeforeTaskUpdate' для модуля 'tasks'
AddEventHandler('tasks', 'OnBeforeTaskUpdate', ['CheckTasks', 'OnBeforeTaskUpdate']);

class CheckTasks {

    // Метод, вызываемый перед обновлением задачи
   public static function OnBeforeTaskUpdate($taskId) {
        $arrData = \Bitrix\Tasks\Internals\TaskTable::getList(
            [
                'filter' => [
                    'PARENT_ID' => (int) $taskId,
                    'STATUS' => 2
                ]
            ]
        )->fetchAll();
        Debug::dumpToFile($arrData);
//        // Проверяем, есть ли в запросе параметр 'ACTION'
//        if ( $_REQUEST['ACTION'] ) {
//
//            // Перебираем каждое действие из параметра 'ACTION'
//            foreach ( $_REQUEST['ACTION'] as $action ) {
//
//                // Проверяем, является ли операция 'task.complete'
//                if ( $action['OPERATION'] === 'task.complete' ) {
//
//                    // Проверяем, есть ли подзадачи у задачи с указанным идентификатором
//                    $isExist  = self::isParentTaskExist($taskId);
//
//                    // Если есть подзадачи, выбрасываем исключение и запрещаем завершение задачи
//                    if ( $isExist === true ) {
//                        throw new \Bitrix\Tasks\ActionFailedException("Для завершения задачи нужно закрыть подзадачи");
//                        return false;
//                    }
//                }
//            }
//        }
    }

//    // Метод для проверки наличия подзадач у задачи
//    function isParentTaskExist( $taskId ) {
//
//        // Если идентификатор задачи не указан, возвращаем false
//        if ( !$taskId ) {
//            return false;
//        }
//
//        // Получаем список задач с указанным родительским идентификатором и статусом 2
//        $arrData = \Bitrix\Tasks\Internals\TaskTable::getList(
//            [
//                'filter' => [
//                    'PARENT_ID' => (int) $taskId,
//                    'STATUS' => 2
//                ]
//            ]
//        )->fetchAll();
//
//        // Если есть подзадачи, возвращаем true, иначе - false
//        if ( $arrData ) {
//            return true;
//        }
//
//        return false;
//    }
}
