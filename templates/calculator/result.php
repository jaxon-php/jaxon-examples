            <input type="text" class="form-control" value="<?= $this->operator !== 'division' ?
                $this->result : sprintf("%.2f", $this->result) ?>" readonly="readonly" />
