<?php

namespace core;

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class MyChat implements MessageComponentInterface
{
    protected $clients;
    protected $rooms;

    public function __construct()
    {
        $this->clients = new \SplObjectStorage;
        $this->rooms = [];
    }

    public function onOpen(ConnectionInterface $conn)
    {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
    }

    public function onMessage(ConnectionInterface $from, $msg)
    {
        $data = json_decode($msg, true);
        // echo "Received data: " . print_r($data, true) . "\n";

        if ($data["type"] === "join") {
            $roomId = $data["room"];
            if (!isset($this->rooms[$roomId])) {
                $this->rooms[$roomId] = new \SplObjectStorage;
            }
            $this->rooms[$roomId]->attach($from);
            // echo "User {$from->resourceId} joined room {$roomId}\n";
        } elseif ($data["type"] === "message") {
            $roomId = $data["room"];
            if (isset($this->rooms[$roomId])) {
                $messageToSend = [
                    "type" => "message",
                    "content" => $data["message"] ?? $data["content"],
                    "user_id" => $data["user_id"],
                    "to_user_id" => $data["to_user_id"],
                    "room" => $roomId,
                    "photo" => $data["photo"],
                    "full_name" => $data["full_name"],
                ];

                // echo "Sending message: " . print_r($messageToSend, true) . "\n";

                foreach ($this->rooms[$roomId] as $client) {
                    if ($client !== $from) {
                        $client->send(json_encode($messageToSend));
                    }
                }
            }
        }
    }

    public function onClose(ConnectionInterface $conn)
    {
        foreach ($this->rooms as $roomId => $clients) {
            if ($clients->contains($conn)) {
                $clients->detach($conn);
                echo "User {$conn->resourceId} left room {$roomId}\n";
            }
        }

        $this->clients->detach($conn);
    }

    public function onError(ConnectionInterface $conn, \Exception $e)
    {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}
