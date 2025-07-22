<?php
namespace App\Http;

class Response
{
    public function __construct(
        private array $data = [],
        private string $status = 'success',
        private int $code = 200,
        private string $message = ''
    ) {
        $this->data = $data;
        $this->status = $status;
        $this->code = $code;
        $this->message = $message;
    }


    public function toArray(): array
    {
        return [
            'data' => $this->data,
            'status' => $this->status,
            'code' => $this->code,
            'message' => $this->message,
        ];
    }
    public function toObject(): object
    {
        return (object) $this->toArray();
    }
}
