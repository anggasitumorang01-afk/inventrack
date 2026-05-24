<?php

namespace App\Filament\Resources\Items\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;    
use Filament\Schemas\Schema;

class ItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_barang')
                    ->label('Nama Barang')
                    ->required()
                    ->maxLength(255),

                TextInput::make('kode_barang')
                    ->label('Kode Barang')
                    ->maxLength(255),

                TextInput::make('deskripsi')
                    ->label('Deskripsi')
                    ->maxLength(255),

                Select::make('category_id')
                    ->label('Kategori')
                    ->relationship('category', 'nama_kategori')
                    ->required(),

                Select::make('supplier_id')
                    ->label('Supplier')
                    ->relationship('supplier', 'nama_perusahaan')
                    ->required(),

                Select::make('kondisi')
                    ->label('Kondisi')
                    ->options([
                        'Baru' => 'Baru',
                        'Bekas' => 'Bekas',
                        'Rusak' => 'Rusak',
                    ])
                    ->required(),

                TextInput::make('lokasi')
                    ->label('Lokasi')
                    ->maxLength(255),

                TextInput::make('stok')
                    ->label('Stok')
                    ->numeric()
                    ->required(),

                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                FileUpload::make('image')
                    ->label('Foto Barang')
                    ->image()
                    ->directory('items'),
            ]);
    }
}